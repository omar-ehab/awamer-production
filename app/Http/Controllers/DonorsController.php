<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Contract;
use App\CreateDonorSanad;
use App\DestroyDonorSanad;
use App\Donor;
use App\Establishment;
use App\Excel_sheet;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class DonorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-donor')->only('index');
        $this->middleware('permission:create-donor')->only('create');
        $this->middleware('permission:create-donor')->only('store');
        $this->middleware('permission:read-donor')->only('show');
        $this->middleware('permission:update-donor')->only('edit');
        $this->middleware('permission:update-donor')->only('update');
        $this->middleware('permission:delete-donor')->only('destroy');
        $this->middleware('permission:update-donor')->only('editStop');
        $this->middleware('permission:update-donor')->only('stopWithdraw');
        $this->middleware('permission:update-donor')->only('activeWithdraw');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexUnapproved()
    {
        if(auth()->user()->can('read-donor'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $donors = Donor::where('establishment_id', $establishmentId)->where('approved', false)->get();
            return view('donors.unapproved-index', compact('donors'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-donor'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $donors = Donor::where('establishment_id', $establishmentId)->where('approved', true)->get();
            return view('donors.index', compact('donors'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(auth()->user()->can('read-donor'))
        {
            $banks = Bank::all();
            $establishment = auth()->user()->establishment;
            $bankAccounts = $establishment->bankAccounts;
            $branches = $establishment->branches;
            return view('donors.create', compact('banks', 'branches', 'bankAccounts'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {


        if(auth()->user()->can('read-donor')) {
            if ($request["withdraw"] == "on") {
                $request["withdraw"] = true;
            } else {
                $request["withdraw"] = false;
            }
            if ($request['success_sms'] == "on") {
                $request['success_sms'] = true;
            } else {
                $request['success_sms'] = false;
            }
            if($request['branch_id'] == 'الفرع الرئيسي') {
                $request['branch_id'] = null;
            }
            $this->validate($request, [
                "name" => "required|string",
                "donor_bank" => "required|integer",
                "iban" => "required|string",
                "donor_account_number" => "required|numeric",
                "bank_account" => "required|integer",
                "amount_of_withdrawal" => "required|numeric",
                "day_of_withdraw" => "required|integer|min:1|max:31",
                "mobile" => "required|digits:12",
                "email" => "email",
                "repeats_in_month" => "required|integer",
//                "withdraw" => "required",
                "withdraw_start_date" => "required|date",
                "withdraw_end_date" => "required|date|after:withdraw_start_date",
                "success_sms" => "required|boolean",
            ]);
            $establishmentId = auth()->user()->establishment_id;
            $donor = Donor::create([
                "establishment_id" => $establishmentId,
                "name" => $request["name"],
                "donor_bank" => $request["donor_bank"],
                "iban" => $request["iban"],
                "donor_account_number" => $request["donor_account_number"],
                "bank_account" => $request["bank_account"],
                "amount_of_withdrawal" => $request["amount_of_withdrawal"],
                "day_of_withdraw" => $request["day_of_withdraw"],
                "branch_id" => $request["branch_id"],
                "mobile" => $request["mobile"],
                "phone" => $request["phone"],
                "email" => $request["email"],
                "repeats_in_month" => $request["repeats_in_month"],
                "withdraw" => 1,
                "withdraw_start_date" => Carbon::parse($request["withdraw_start_date"]),
                "withdraw_end_date" => Carbon::parse($request["withdraw_end_date"]),
                "withdraw_description" => $request["withdraw_description"],
                "success_sms" => $request["success_sms"],
                'approved' => true,
            ]);
            CreateDonorSanad::create([
                'establishment_id' => $establishmentId,
                'sanad_date' => Carbon::now()->toDateString(),
                'sanad_number' => time(),
                'donor_id' => $donor->id,
                'amount' => $donor->amount_of_withdrawal,
                'branch_id' => $request['branch_id'],
                'registration_date' => Carbon::now()->toDateString(),
                'withdrawal_start_date' => Carbon::parse($request["withdraw_start_date"]),
                'withdrawal_end_date' => Carbon::parse($request["withdraw_end_date"])
            ]);
            return redirect('/donors')->with('data', ['alert'=>'تم اضافة المتبرع بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param Donor $donor
     * @return Response
     */
    public function show(Donor $donor)
    {
        if(auth()->user()->can('read-donor') && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            return view('donors.show', compact('donor'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Donor $donor
     * @return Response
     */
    public function edit(Donor $donor)
    {
        if(auth()->user()->can('update-donor') && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            $banks = Bank::all();
            $establishment = auth()->user()->establishment;
            $bankAccounts = $establishment->bankAccounts;
            $branches = $establishment->branches;
            return view('donors.edit', compact('donor', 'banks', 'bankAccounts', 'branches'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Donor $donor
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Donor $donor)
    {
        if(auth()->user()->can('update-donor') && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            if($request["withdraw"] == "on")
            {
                $request["withdraw"] = true;
            } else {
                $request["withdraw"] = false;
            }
            if($request['success_sms'] == "on")
            {
                $request['success_sms'] = true;
            } else {
                $request['success_sms'] = false;
            }
            if($request['branch_id'] == 'الفرع الرئيسي') {
                $request['branch_id'] = null;
            }

            $this->validate($request, [
                "name" => "required|string",
                "donor_bank" => "required|integer",
                "iban" => "required|string",
                "donor_account_number" => "required|numeric",
                "bank_account" => "required|integer",
                "amount_of_withdrawal" => "required|numeric",
                "day_of_withdraw" => "required|integer|min:1|max:31",
                "mobile" => "required|digits:12",
                "email" => "email",
                "repeats_in_month" => "required|integer",
                "withdraw_start_date" => "required|date",
                "withdraw_end_date" => "required|date|after:withdraw_start_date",
                "success_sms" => "required|boolean",
            ]);

            $donor->update([
                "name" => $request["name"],
                "donor_bank" => $request["donor_bank"],
                "iban" => $request["iban"],
                "donor_account_number" => $request["donor_account_number"],
                "bank_account" => $request["bank_account"],
                "amount_of_withdrawal" => $request["amount_of_withdrawal"],
                "day_of_withdraw" => $request["day_of_withdraw"],
                "branch_id" => $request["branch_id"],
                "mobile" => $request["mobile"],
                "phone" => $request["phone"],
                "email" => $request["email"],
                "repeats_in_month" => $request["repeats_in_month"],
                "withdraw_start_date" => Carbon::parse($request["withdraw_start_date"]),
                "withdraw_end_date" => Carbon::parse($request["withdraw_end_date"]),
                "withdraw_description" => $request["withdraw_description"],
                "success_sms" => $request["success_sms"],
            ]);
            return redirect('/donors')->with('data', ['alert'=>'تم تعديل المتبرع بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Donor $donor
     * @return Response
     * @throws Exception
     */
    public function destroy(Donor $donor)
    {
        dd(auth()->user()->can("delete-donor") && $donor["establishment_id"] === auth()->user()->establishment_id);
        if(auth()->user()->can("delete-donor") && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            try {
                $donor->delete();
                return redirect('/donors')->with('data', ['alert'=>'تم حذف المتبرع بنجاح','alert-type'=>'success']);
            } catch (Exception $e) {
                throw $e;
            }
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for stop the specified resource.
     *
     * @param Donor $donor
     * @return Response
     */
    public function editStop(Donor $donor)
    {
        if(auth()->user()->can('update-donor') && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            return view('donors.stop', compact('donor'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update field from the specified resource from storage.
     *
     * @param Request $request
     * @param Donor $donor
     * @return Response
     * @throws Exception
     */
    public function stopWithdraw(Request $request, Donor $donor)
    {
        if(auth()->user()->can("update-donor") && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            if($donor->withdraw)
            {
                $this->validate($request, [
                    'notes' => 'required|string'
                ]);
                $establishmentId = auth()->user()->establishment_id;
                $donor->update([
                    'withdraw' => false
                ]);
                DestroyDonorSanad::create([
                    'establishment_id' => $establishmentId,
                    'sanad_date' => Carbon::now()->toDateString(),
                    'sanad_number' => time(),
                    'donor_id' => $donor->id,
                    'branch_id' => $donor->branch_id,
                    'donor_destroy_date' => Carbon::now()->toDateString(),
                    'notes' => $request['notes']
                ]);
            }
            return redirect('/donors')->with('data', ['alert'=>'تم إيقاف المتبرع','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }


    public function importExcelView(Request $request)
    {
        return view('donors.import-view');
    }
    public function importExcel(Request $request)
    {
        $request->validate(['excel_sheet'=>'required|file']);
        if(null !==$request->file('excel_sheet'))
        {
            $excel_sheet_name= uniqid().time().'.'.$request->file('excel_sheet')->getClientOriginalExtension();
            $excel_sheet_store= Excel_sheet::create(['path'=>$excel_sheet_name]);
            $request->file('excel_sheet')->storeAs('excel', $excel_sheet_name);
        }
        $file_path = $request->file('excel_sheet');
        $data = Excel::load($file_path, function ($reader){
               $reader->noHeading();
               $reader->ignoreEmpty();

        })->get();



        if(null!==$data){
            foreach($data as $mydata)
            {
                $donor = Donor::create([
                    "establishment_id" => auth()->user()->establishment->id,
                    "name" => $request[0],
                    "donor_bank" => $request[1],
                    "iban" => $request[2],
                    "donor_account_number" => $request[3],
                    "bank_account" => $request[4],
                    "amount_of_withdrawal" => $request[5],
                    "day_of_withdraw" => $request[6],
                    "branch_id" => $request[7],
                    "mobile" => $request[8],
                    "phone" => $request[9],
                    "email" => $request[10],
                    "repeats_in_month" => $request[11],
                    "withdraw" => true,
                    "withdraw_start_date" => Carbon::parse($request[12]),
                    "withdraw_end_date" => Carbon::parse($request[13]),
                    "withdraw_description" => $request[14],
                    "success_sms" => $request[15],

                ]);
                CreateDonorSanad::create([
                    'establishment_id' => auth()->user()->establishment->id,
                    'sanad_date' => Carbon::now()->toDateString(),
                    'sanad_number' => time(),
                    'donor_id' => $donor->id,
                    'amount' => $donor->amount_of_withdrawal,
                    'branch_id' => $donor->branch_id ,
                    'registration_date' => Carbon::now()->toDateString(),
                    'withdrawal_start_date' => Carbon::parse($request[12]),
                    'withdrawal_end_date' => Carbon::parse($request[13])
                ]);
            }

            return redirect('/donors')->with('data', ['alert'=>'تمت الإستيراد بنجاح','alert-type'=>'success']);
        }
        //return dd($data); //ready to add
    }

    /**
     * Update field from the specified resource from storage.
     *
     * @param Donor $donor
     * @return Response
     */
    public function activeWithdraw(Donor $donor)
    {
        if(auth()->user()->can("update-donor") && $donor["establishment_id"] === auth()->user()->establishment_id)
        {
            if(!$donor->withdraw)
            {
                $donor->update([
                    'withdraw' => true
                ]);
            }
            return redirect('/donors')->with('data', ['alert'=>'تمت إعادة تفعيل المتبرع','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }


    public function onlineCreate($encrypted_establishment_id)
    {
        $encrypted_establishment_id = $this->encrypt_decrypt('decrypt' ,$encrypted_establishment_id);
        $banks = Bank::all();
        $establishment = Establishment::find($encrypted_establishment_id);
        $encrypted_establishment_id = $this->encrypt_decrypt('encrypt' ,$encrypted_establishment_id);
        $bankAccounts = $establishment->bankAccounts;
        $branches = $establishment->branches;
        return view('donors.online-register', compact('banks', 'bankAccounts', 'branches', 'establishment', 'encrypted_establishment_id'));
    }


    public function onlineStore(Request $request, $encrypted_establishment_id)
    {
        $encrypted_establishment_id = $this->encrypt_decrypt('decrypt' ,$encrypted_establishment_id);
        if($encrypted_establishment_id)
        {
            if($request["withdraw"] == "on") {
                $request["withdraw"] = true;
            } else {
                $request["withdraw"] = false;
            }
            if ($request['success_sms'] == "on") {
                $request['success_sms'] = true;
            } else {
                $request['success_sms'] = false;
            }

            $this->validate($request, [
                "name" => "required|string",
                "donor_bank" => "required|integer",
                "iban" => "required|string",
                "donor_account_number" => "required|numeric",
                "bank_account" => "required|integer",
                "amount_of_withdrawal" => "required|numeric",
                "day_of_withdraw" => "required|integer|min:1|max:31",
                "branch_id" => "integer",
                "mobile" => "required|digits:12",
                "email" => "email",
                "repeats_in_month" => "required|integer",
                "withdraw" => "required",
                "withdraw_start_date" => "required|date",
                "withdraw_end_date" => "required|date|after:withdraw_start_date",
                "success_sms" => "required|boolean",
            ]);
            $donor = Donor::create([
                "establishment_id" => $encrypted_establishment_id,
                "name" => $request["name"],
                "donor_bank" => $request["donor_bank"],
                "iban" => $request["iban"],
                "donor_account_number" => $request["donor_account_number"],
                "bank_account" => $request["bank_account"],
                "amount_of_withdrawal" => $request["amount_of_withdrawal"],
                "day_of_withdraw" => $request["day_of_withdraw"],
                "branch_id" => $request["branch_id"],
                "mobile" => $request["mobile"],
                "phone" => $request["phone"],
                "email" => $request["email"],
                "repeats_in_month" => $request["repeats_in_month"],
                "withdraw" => $request["withdraw"],
                "withdraw_start_date" => Carbon::parse($request["withdraw_start_date"]),
                "withdraw_end_date" => Carbon::parse($request["withdraw_end_date"]),
                "withdraw_description" => $request["withdraw_description"],
                "success_sms" => $request["success_sms"],
            ]);
            return redirect(route('donors.establishment.create', $this->encrypt_decrypt('encrypt' ,$encrypted_establishment_id)), $encrypted_establishment_id)->with('data', ['alert'=>'تم التسجيل بنجاح بأنتظار موافقة الجهة','alert-type'=>'warning']);
        }
        return redirect('/');
    }

    public function approve(Request $request)
    {
        $this->validate($request, [
            'donor_id' => 'required|integer',

        ]);
        $donor = Donor::find($request['donor_id']);
        $donor->update([
            'approved' => 1,
            'withdraw' => true
        ]);
        CreateDonorSanad::create([
            'establishment_id' => $donor->establishment_id,
            'sanad_date' => Carbon::now()->toDateString(),
            'sanad_number' => time(),
            'donor_id' => $donor->id,
            'amount' => $donor->amount_of_withdrawal,
            'branch_id' => $donor->branch_id,
            'registration_date' => Carbon::now()->toDateString(),
            'withdrawal_start_date' => Carbon::parse($donor->withdraw_start_date),
            'withdrawal_end_date' => Carbon::parse($donor->withdraw_end_date)
        ]);
        $approve_template = "مرحباً بكم في منصة الأوامر المستديمة <br> لقد تمت الموافقة علي طلب انضمامكم للجهة بنجاح<br> برجاء التواصل مع الجهة في اقرب وقت";
        $details['email'] = $donor->email;
        $details['message'] = $approve_template;
        $this->dispatch(new SendEmailJob($details));
        //here we should send sms message

        return redirect('/unapproved-donors')->with('data', ['alert'=>'تم الموافقه المتبرع بنجاح','alert-type'=>'success']);
    }


    private function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = env('APP_KEY', "MJBvTfIqnX6fZXZOWRHYbpA1EBMDVvRN");
        $secret_iv = 'wNzeDKK1JQEebIwkpb2WNPABDYgvt5aj';
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}
