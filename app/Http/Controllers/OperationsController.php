<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Donor;
use App\Establishment;
use App\Interval;
use App\Jobs\SendEmailJob;
use App\Operation;
use App\SystemFee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/*use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

 */
use Maatwebsite\Excel\Facades\Excel;

class OperationsController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (auth()->user()->can('create-operation')) {
            $establishmentId = auth()->user()->establishment_id;
            $intervals = Interval::all();
            if (count($intervals) <= 0) {
                return redirect('/')->with('data', ['alert' => 'لا يوجد فترات لإدخال عمليه يدوية', 'alert-type' => 'danger']);
            }
            $bank_accounts = BankAccount::where('establishment_id', $establishmentId)->get();
            if (count($bank_accounts) <= 0) {
                return redirect('/')->with('data', ['alert' => 'لا يوجد حسابات بنكية لإدخال عمليه يدوية', 'alert-type' => 'danger']);
            }
            $firstInterval = $intervals->first();
            $firstBankAccount = $bank_accounts->first();
            $donors = Donor::getDonorsBetweenTwoDates($establishmentId, $firstInterval->start, $firstInterval->end, $firstBankAccount->id);
            return view('operations.create', compact('donors', 'intervals', 'bank_accounts'));
        }
        return redirect('/')->with('data', ['alert' => 'حدث خطأ في المصادقة', 'alert-type' => 'danger']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request) {
        if (auth()->user()->can('create-operation')) {

            $this->validate($request, [
                'donor_ids' => 'required|array|min:0',
                'donor_ids.*' => 'required|integer|distinct',
                'interval_id' => 'required|integer',
                'bank_account_id' => 'required|integer',
            ]);

            $establishmentId = auth()->user()->establishment_id;
            $donors = Donor::where('establishment_id', $establishmentId)->get();
            $establishment = Establishment::find($establishmentId);
            DB::beginTransaction();
            try {
                foreach ($donors as $donor) {
                    $operation = Operation::where('establishment_id', $establishmentId)
                        ->where('donor_id', $donor->id)
                        ->where('interval_id', $request['interval_id'])
                        ->where('type', "manual")
                        ->first();

                    if ($operation) {
                        if (!$operation->success && in_array($donor->id, $request['donor_ids'])) {
                            $operation->update([
                                'success' => true,
                            ]);
                            $this->recordSystemFees($establishment, $operation);
                            $this->sendSuccessEmail($donor);
                            $successMsg = 'تم تنفيذ الأمر المستديم الخاص بك بمبلغ(' . $operation->amount . ') ريال ' . 'والمخصص ل (' . $establishment->name . ') بتاريخ (' . Carbon::now()->toDateString() . ')';
                            if ($donor->establishment->send_sms && $donor->success_sms) {
                                $this->send_mobily_sms($donor->mobile, $successMsg);
                            }
                        }
                    } else {
                        if (in_array($donor->id, $request['donor_ids'])) {
                            $o = Operation::create([
                                'establishment_id' => $establishmentId,
                                'donor_id' => $donor->id,
                                'interval_id' => $request['interval_id'],
                                'bank_account_id' => $request['bank_account_id'],
                                'success' => true,
                                'type' => "manual",
                                'operation_date' => Carbon::now(),
                                'amount' => $donor->amount_of_withdrawal,
                            ]);
                            $this->recordSystemFees($establishment, $o);
                            $this->sendSuccessEmail($donor);
                            $successMsg = 'تم تنفيذ الأمر المستديم الخاص بك بمبلغ(' . $o->amount . ') ريال ' . 'والمخصص ل (' . $establishment->name . ') بتاريخ (' . Carbon::now()->toDateString() . ')';
                            if ($donor->establishment->send_sms) {
                                $this->send_mobily_sms($donor->mobile, $successMsg);
                            }
                        } else {
                            $o = Operation::create([
                                'establishment_id' => $establishmentId,
                                'donor_id' => $donor->id,
                                'interval_id' => $request['interval_id'],
                                'bank_account_id' => $request['bank_account_id'],
                                'success' => false,
                                'type' => "manual",
                                'operation_date' => Carbon::now(),
                                'amount' => $donor->amount_of_withdrawal,
                            ]);
                        }
                        $this->sendFailedEmail($donor);
                    }
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
            return redirect('/operations/create')->with('data', ['alert' => 'تم اضافة العمليات بنجاح', 'alert-type' => 'success']);
        }
        return redirect('/')->with('data', ['alert' => 'حدث خطأ في المصادقة', 'alert-type' => 'danger']);
    }

    public function getDonorsByIntervalAndBank(Request $request) {
        if (auth()->user()->can('read-donor')) {
            $interval = Interval::find($request['interval_id']);
            $establishmentId = auth()->user()->establishment_id;
            $bank_account = $request['bank_account'];
            $donors = Donor::getDonorsBetweenTwoDates($establishmentId, $interval->start, $interval->end, $bank_account);
            return $donors;
        }
        return redirect('/')->with('data', ['alert' => 'حدث خطأ في المصادقة', 'alert-type' => 'danger']);
    }

    private function sendSuccessEmail(Donor $donor) {
        $approve_template = "مرحباً بكم في منصة الأوامر المستديمة \n لقد نجحت عملية الإستقطاع لهذا الشهر";
        $details['email'] = $donor->email;
        $details['message'] = $approve_template;
        $this->dispatch(new SendEmailJob($details));
    }

    private function sendFailedEmail(Donor $donor) {
        $approve_template = "مرحباً بكم في منصة الأوامر المستديمة \n لقد فشلت عملية الإستقطاع لهذا الشهر \n برجاء مراجعة الجهه في اسرع وقت";
        $details['email'] = $donor->email;
        $details['message'] = $approve_template;
        $this->dispatch(new SendEmailJob($details));
    }

    public function createAuto(Request $request) {

        /*
                        $table->unsignedBigInteger('bank_id');
                        $table->foreign('bank_id')->references('id')->on('banks')->onDelete('restrict');
                        $table->string('account_number', 35);
                        $table->string('iban', 15)->nullable();
                        $table->text('description')->nullable();
        */

        $bank_accounts = BankAccount::where('establishment_id', auth()->user()->establishment->id)->get();
        $intervals = Interval::all();

        //return $intervals;
        return view('operations.auto', compact('bank_accounts', 'intervals'));
    }

    public function storeAuto(Request $request) {
        //validation
        $request->validate([
            'bank_account' => 'numeric|required',
            'interval' => 'required',
            'excel_sheet' => 'required|file',
        ]);

        $establishment = Establishment::find(auth()->user()->establishment_id);

        //arrays to store final result that will be stored to DB
        $successeded_operations = array();
        $failed_operations = array();
        $another_operations = array();

        //get bank name to check
        $bankx = \App\BankAccount::where('id', $request->bank_account)->get()->first();
        $bank = $bankx->bank->name;

        //get donors_on_bank_account
        $donors_on_bank_account = \App\Donor::where('bank_account', $request->bank_account)->where('establishment_id', \Auth::user()->establishment->id)->get();

        //return $donors_on_bank_account;

        //$excel_sheet_store;

        $excel_sheet_name;
        if (null !== $request->file('excel_sheet')) {
            $excel_sheet_name = uniqid() . time() . '.' . $request->file('excel_sheet')->getClientOriginalExtension();
            $excel_sheet_store = \App\Excel_sheet::create(['path' => $excel_sheet_name]);
            $request->file('excel_sheet')->storeAs('excel', $excel_sheet_name);
        }
        $Excel_sheet_id_after_store = \App\Excel_sheet::create(['path' => $excel_sheet_name]);

        //store successed operations donors ids
        $done = array();
        //total_success_amount_money
        $total_success_amount_money = 0;
        //total_failed_amount_money
        $total_failed_amount_money = 0;
        //total_another_amount_money
        $total_another_amount_money = 0;
        $total_system_fees = 0;

        //$bank="alrag7y"; //الأهلي&alrag7y

        if ($bank == 'الأهلي' || $bank == "الاهلي" || $bank == "الأهلى" || $bank == "الاهلى" || $bank == "البنك الأهلي التجاري") {

            $file_path = $request->file('excel_sheet');
            $data = Excel::load($file_path, function ($reader) {
                $reader->noHeading();
                $reader->ignoreEmpty();

            })->get();

            $operationsx = array();

            for ($i = 0; $i < count($data); $i++) {
                if (count($data[$i]) == 4 && $data[$i][0] != 'التاريخ') {

                    array_push($operationsx, $data[$i]);

                }
                //return $data[$i][0]; // count($data[$i]);
            }

            for ($i = 0; $i < count($operationsx); $i++) {
                $size = preg_replace("/[^A-Za-z]/", '', $operationsx[$i][2]);
                $check_donor_exist = \App\Donor::where('donor_account_number', filter_var($operationsx[$i][2], FILTER_SANITIZE_NUMBER_INT))->get()->first();

                // return filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT);
                if (
                    isset($check_donor_exist) != 0 &&
                    $operationsx[$i][1] == "حواله مستديمه" &&
                    isset($check_donor_exist['amount_of_withdrawal']) &&
                    filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT) != 0 &&
                    $check_donor_exist['amount_of_withdrawal'] == filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT) &&
                    explode(' ', explode('-', $operationsx[$i][0])[2])[0] == $check_donor_exist['day_of_withdraw']
                ) {
                    //success

                    $total_success_amount_money += filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT);
                    array_push($done, $check_donor_exist['id']);

                    $temp_array = array(
                        'type' => 'امر مستديم من داخل البنك لمتبرع مسجل في بيانات المتبرعين التابعين للجهة',
                        'operation' => $operationsx[$i],
                    );
                    array_push($successeded_operations, $temp_array);
                    $total_system_fees += $this->calcRecordSystemFees(\Auth::user()->establishment, filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT));

                } elseif (
                    null === $check_donor_exist &&
                    $operationsx[$i][1] == "حواله مستديمه" &&
                    filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT) != 0
                ) {

                    $temp_array = array(
                        'type' => 'امر مستديم من داخل البنك لمتبرع غير مسجل بياناتة في متبرعي الجهة',
                        'operation' => $operationsx[$i],
                    );

                    $total_another_amount_money += filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT);

                    array_push($another_operations, $temp_array);
                } else if (filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT) != 0) {
                    $temp_array = array(
                        'type' => 'أخري',
                        'operation' => $operationsx[$i],
                    );
                    $total_another_amount_money += filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT);

                    $total_system_fees += $this->calcRecordSystemFees(\Auth::user()->establishment, filter_var($operationsx[$i][3], FILTER_VALIDATE_FLOAT));

                    array_push($another_operations, $temp_array);
                }

            }

            //return $done;

            for ($i = 0; $i < count($donors_on_bank_account); $i++) {
                if (!in_array($donors_on_bank_account[$i]->id, $done)) {

                    $total_failed_amount_money += filter_var($donors_on_bank_account[$i]->amount_of_withdrawal, FILTER_VALIDATE_FLOAT);
                    $temp_array = array(
                        'type' => 'متبرع مسجل في المنصة ولكن غير موجود في ملف الاستيراد',
                        'operation' => array(
                            $donors_on_bank_account[$i]->id,
                            $donors_on_bank_account[$i]->name,
                        ),

                    );

                    array_push($failed_operations, $temp_array);
                }
            }

            $newData = array(
                'successeded_operations' => (array) ($successeded_operations),
                'failed_operations' => (array) ($failed_operations),
                'another_operations' => (array) ($another_operations),
                'total_another_amount_money' => $total_another_amount_money,
                'total_failed_amount_money' => $total_failed_amount_money,
                'total_success_amount_money' => $total_success_amount_money,
                'interval' => \App\Interval::find($request->interval),
                'bank_account_id' => $request->bank_account,
                'excel_sheet' => $Excel_sheet_id_after_store,
            );

        } elseif ($bank == 'الراجحي' || $bank == 'الراجحى' || $bank == "مصرف الراجحي") {

            $file_path = $request->file('excel_sheet');
            $data = Excel::load($file_path, function ($reader) {
                $reader->noHeading();
                $reader->ignoreEmpty();

            })->get();

            $get_titles = array(
                'اسم العميل ',
                'الفرع',
                'رقم الحساب',
                'العملة',
                'الفترة',
                'Duration Hijra',
                'الرصيد  الافتتاحي',
                'رصيد  الاغلاق',
                'عدد  عمليات  الايداع',
                'عدد عمليات الخصم عدد  عمليات  الخصم',
                'الرصيد الافتتاحي',
                'مجموع  مبلغ  الايداعات',
                'مجموع  مبلغ  المخصوم',
                'رصيد  الاغلاق',
            );

            $get_titles_values = array();
            $operationsx = array();

            for ($i = 0; $i < count($data); $i++) {
                for ($x = 0; $x < count($data[$i]); $x++) {
                    //return $data[$i][$x];
                    if (in_array($data[$i][$x], $get_titles)) {
                        if (isset($data[$i][$x - 1])) {
                            $get_titles_values[$data[$i][$x]] = $data[$i][$x - 1];
                        }

                        //array_push($get_titles_values, $data[$i][$x-1]);
                        //$get_titles[$data[$i][$x]]=$data[$i][$x-1];
                        if (count($data[$i]) == 6) {array_push($operationsx, $data[$i]);}

                    }

                }

            }

            $get_data = array(
                'important_titles' => $get_titles_values,
                'operations' => $operationsx,
            );

            for ($i = 0; $i < count($operationsx); $i++) {
                $size = preg_replace("/[^A-Za-z]/", '', $operationsx[$i][4]);
                $check_donor_exist = \App\Donor::where('donor_account_number', preg_replace("/[^0-9]/", "", $operationsx[$i][4]))->get()->first();

                if (
                    null !== $check_donor_exist &&
                    $operationsx[$i][3] == "أمر مستديم" &&
                    isset($check_donor_exist['amount_of_withdrawal']) &&
                    filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT) != 0 &&
                    $check_donor_exist['amount_of_withdrawal'] == filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT) &&
                    str_replace("'", "", explode('/', $operationsx[$i][5])[0]) == $check_donor_exist['day_of_withdraw']
                ) {
                    //success

                    $total_success_amount_money += filter_var($operationsx[$i][0], FILTER_VALIDATE_FLOAT);

                    array_push($done, $check_donor_exist['id']);
                    $temp_array = array(
                        'type' => 'امر مستديم من داخل البنك لمتبرع مسجل في بيانات المتبرعين التابعين للجهة',
                        'operation' => $operationsx[$i],
                    );
                    array_push($successeded_operations, $temp_array);
                    $total_system_fees += $this->calcRecordSystemFees(\Auth::user()->establishment, filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT));

                } elseif (
                    null === $check_donor_exist &&
                    $operationsx[$i][3] == "أمر مستديم" &&
                    filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT) != 0
                ) {

                    $total_another_amount_money += filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT);

                    $temp_array = array(
                        'type' => 'امر مستديم من داخل البنك لمتبرع غير مسجل بياناتة في متبرعي الجهة',
                        'operation' => $operationsx[$i],
                    );

                    array_push($another_operations, $temp_array);
                } else if (filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT) != 0) {
                    $total_another_amount_money += filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT);
                    $temp_array = array(
                        'type' => 'أخري',
                        'operation' => $operationsx[$i],
                    );
                    $total_system_fees += $this->calcRecordSystemFees(\Auth::user()->establishment, filter_var($operationsx[$i][2], FILTER_VALIDATE_FLOAT));
                    array_push($another_operations, $temp_array);
                }
            }

            for ($i = 0; $i < count($donors_on_bank_account); $i++) {
                if (!in_array($donors_on_bank_account[$i]->id, $done)) {

                    $total_failed_amount_money += filter_var($donors_on_bank_account[$i]->amount_of_withdrawal, FILTER_VALIDATE_FLOAT);

                    $temp_array = array(
                        'type' => 'متبرع مسجل في المنصة ولكن غير موجود في ملف الاستيراد',
                        'operation' => array(
                            $donors_on_bank_account[$i]->id,
                            $donors_on_bank_account[$i]->name,
                        ),

                    );

                    array_push($failed_operations, $temp_array);
                }
            }

            $newData = array(
                'successeded_operations' => (array) ($successeded_operations),
                'failed_operations' => (array) ($failed_operations),
                'another_operations' => (array) ($another_operations),
                'total_another_amount_money' => $total_another_amount_money,
                'total_failed_amount_money' => $total_failed_amount_money,
                'total_success_amount_money' => $total_success_amount_money,
                'interval' => \App\Interval::find($request->interval),
                'bank_account_id' => $request->bank_account,
                'excel_sheet' => $Excel_sheet_id_after_store,
                'total_system_fees' => $total_system_fees,
            );

            /*
             */

        } else {
            return redirect()->back()->with('data', ['alert' => 'برجاء اختيار نوع البنك المتاح', 'alert-type' => 'danger']);
        }

        session(['import_final_data' => $newData]);
        return view('operations.importing-confirm', $newData);

    }

    public function storeAutoConfirmPrint(Request $request) {
        if (session('import_final_data')) {

            $arrayName = array(
                'successeded_operations' => session('import_final_data')['successeded_operations'],
                'failed_operations' => session('import_final_data')['failed_operations'],
                'another_operations' => session('import_final_data')['another_operations'],
                'total_another_amount_money' => session('import_final_data')['total_another_amount_money'],
                'total_failed_amount_money' => session('import_final_data')['total_failed_amount_money'],
                'total_success_amount_money' => session('import_final_data')['total_success_amount_money'],
                'interval' => session('import_final_data')['interval'],
                'bank_account_id' => session('import_final_data')['bank_account_id'],
                'excel_sheet' => session('import_final_data')['excel_sheet'],
                'total_system_fees' => session('import_final_data')['total_system_fees'],
            );

            return view('operations.print-import', $arrayName);
        }
    }

    public function storeAutoConfirm(Request $request) {

        $request->merge(session('import_final_data'));
        $establishment = \Auth::user()->establishment;
        $bankx = \App\BankAccount::where('id', $request->bank_account_id)->get()->first();
        $bank = $bankx->bank->name;

        if ($bank == 'الأهلي' || $bank == "الاهلي" || $bank == "الأهلى" || $bank == "الاهلى" || $bank == "البنك الأهلي التجاري") {

            for ($i = 0; $i < count($request->successeded_operations); $i++) {
                $check_donor_exist = Donor::where('donor_account_number', filter_var($request->successeded_operations[$i]['operation'][2], FILTER_SANITIZE_NUMBER_INT))->get()->first();

                $operation = Operation::create([
                    'establishment_id' => \Auth::user()->establishment->id,
                    'donor_id' => (null !== $check_donor_exist['id']) ? $check_donor_exist['id'] : null,
                    'interval_id' => $request->interval->id,
                    'bank_account_id' => $request->bank_account_id,
                    'state' => $request->successeded_operations[$i]['type'],
                    'type' => "auto",
                    'amount' => $request->successeded_operations[$i]['operation'][3],
                    'excel_sheet_id' => $request->excel_sheet->id,
                    'summary' => (string) json_encode($request->successeded_operations[$i]['operation']),
                    'success' => 1,
                    'operation_date' => date('Y-m-d h:i:s'),
                ]);

                $this->recordSystemFees($establishment, $operation);
                if ($establishment->send_sms && $check_donor_exist->success_sms) {
                    $this->send_mobily_sms($check_donor_exist['mobile'], $check_donor_exist['success_sms']);
                }
            }

            for ($i = 0; $i < count($request->failed_operations); $i++) {
                $check_donor_exist = Donor::where('id', $request->failed_operations[$i]['operation'][0])->get()->first();

                $operation = Operation::create([
                    'establishment_id' => auth()->user()->establishment_id,
                    'donor_id' => (null !== $check_donor_exist['id']) ? $check_donor_exist['id'] : null,
                    'interval_id' => $request->interval->id,
                    'bank_account_id' => $request->bank_account_id,
                    'state' => $request->failed_operations[$i]['type'],
                    'type' => "auto",
                    'excel_sheet_id' => $request->excel_sheet->id,
                    'success' => 0,
                    'summary' => (string) json_encode($request->failed_operations[$i]['operation']),
                    'operation_date' => date('Y-m-d h:i:s'),
                ]);

            }

            for ($i = 0; $i < count($request->another_operations); $i++) {
                $check_donor_exist = Donor::where('donor_account_number', filter_var($request->another_operations[$i]['operation'][2], FILTER_SANITIZE_NUMBER_INT))->get()->first();

                // return filter_var($request->another_operations[$i]['operation'][2], FILTER_SANITIZE_NUMBER_INT);
                $operation = Operation::create([
                    'establishment_id' => auth()->user()->establishment_id,
                    'donor_id' => (null !== $check_donor_exist['id']) ? $check_donor_exist['id'] : null,
                    'interval_id' => $request->interval->id,
                    'bank_account_id' => $request->bank_account_id,
                    'state' => $request->another_operations[$i]['type'],
                    'type' => "auto",
                    'amount' => $request->another_operations[$i]['operation'][3],
                    'excel_sheet_id' => $request->excel_sheet->id,
                    'success' => 0,
                    'summary' => (string) json_encode($request->another_operations[$i]['operation']),
                    'operation_date' => date('Y-m-d h:i:s'),
                ]);

                $this->recordSystemFees($establishment, $operation);
            }

            return 1;
        } elseif ($bank == 'الراجحي' || $bank == 'الراجحى' || $bank == "مصرف الراجحي") {
            for ($i = 0; $i < count($request->successeded_operations); $i++) {
                $check_donor_exist = Donor::where('donor_account_number', filter_var($request->successeded_operations[$i]['operation'][4], FILTER_SANITIZE_NUMBER_INT))->get()->first();

                $operation = Operation::create([
                    'establishment_id' => auth()->user()->establishment_id,
                    'donor_id' => (null !== $check_donor_exist['id']) ? $check_donor_exist['id'] : null,
                    'interval_id' => $request->interval->id,
                    'bank_account_id' => $request->bank_account_id,
                    'state' => $request->successeded_operations[$i]['type'],
                    'type' => "auto",
                    'amount' => $request->successeded_operations[$i]['operation'][2],
                    'excel_sheet_id' => $request->excel_sheet->id,
                    'success' => 1,
                    'summary' => (string) json_encode($request->successeded_operations[$i]['operation']),
                    'operation_date' => date('Y-m-d h:i:s'),
                ]);
                $this->recordSystemFees($establishment, $operation);
                if ($establishment->send_sms && $check_donor_exist->success_sms) {
                    $this->send_mobily_sms($check_donor_exist['mobile'], $check_donor_exist['success_sms']);
                }
            }

            //return $request->failed_operations[0]['operation'][0];
            for ($i = 0; $i < count($request->failed_operations); $i++) {
                $check_donor_exist = Donor::where('id', $request->failed_operations[$i]['operation'][0])->get()->first();

                $operation = Operation::create([
                    'establishment_id' => auth()->user()->establishment_id,
                    'donor_id' => (null !== $check_donor_exist['id']) ? $check_donor_exist['id'] : null,
                    'interval_id' => $request->interval->id,
                    'bank_account_id' => $request->bank_account_id,
                    'state' => $request->failed_operations[$i]['type'],
                    'type' => "auto",
                    'excel_sheet_id' => $request->excel_sheet->id,
                    'success' => 0,
                    'summary' => (string) json_encode($request->failed_operations[$i]['operation']),
                    'operation_date' => date('Y-m-d h:i:s'),
                ]);
            }

            for ($i = 0; $i < count($request->another_operations); $i++) {
                $check_donor_exist = Donor::where('donor_account_number', filter_var($request->another_operations[$i]['operation'][4], FILTER_SANITIZE_NUMBER_INT))->get()->first();

                $operation = Operation::create([
                    'establishment_id' => auth()->user()->establishment_id,
                    'donor_id' => (null !== $check_donor_exist['id']) ? $check_donor_exist['id'] : null,
                    'interval_id' => $request->interval->id,
                    'bank_account_id' => $request->bank_account_id,
                    'state' => $request->another_operations[$i]['type'],
                    'type' => "auto",
                    'amount' => $request->another_operations[$i]['operation'][2],
                    'excel_sheet_id' => $request->excel_sheet->id,
                    'success' => 1,
                    'summary' => (string) json_encode($request->another_operations[$i]['operation']),
                    'operation_date' => date('Y-m-d h:i:s'),
                ]);
                $this->recordSystemFees($establishment, $operation);
            }
            return 1;

        } else {
            return 0;
        }
        return 0;

    }

    private function recordSystemFees(Establishment $establishment, Operation $operation) {
        $establishmentId = $establishment->id;
        $percentage = $establishment->contract->percentage;
        $value = $establishment->contract->value;
        $amount = $operation->amount;
        if ($percentage) {
            $fee = $amount * $value / 100;
        } else {
            $fee = $value;
        }
        SystemFee::create([
            'establishment_id' => $establishmentId,
            'fee' => $fee,
            'fee_date' => Carbon::parse($operation->created_at)->toDateString(),
        ]);
    }

    private function calcRecordSystemFees(Establishment $establishment, $amount = 0) {
        $establishmentId = $establishment->id;
        $percentage = $establishment->contract->percentage;
        $value = $establishment->contract->value;
        $amount = $amount;
        $fee = 0;
        if ($percentage) {
            $fee = $amount * $value / 100;
        } else {
            $fee = $value;
        }
        return $fee;
    }

}
