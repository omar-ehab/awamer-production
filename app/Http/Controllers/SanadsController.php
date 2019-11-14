<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Donor;
use App\Interval;
use App\Operation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\CreateDonorSanad;
use App\DestroyDonorSanad;
use App\IntervalReceivableSanad;
use App\DonorReceivableSanad;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SanadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-sanad', ['only' =>
            'createDonorSanads',
            'destroyDonorSanads',
            'IntervalReceivableSanad',
            'IntervalReceivableSanadPrint',
            'IntervalReceivableSanadCreate',
            'DonorReceivableSanad',
            'DonorReceivableSanadPrint'
        ]);

        $this->middleware('permission:create-sanad', ['only' =>
            'IntervalReceivableSanadStore',
            'DonorReceivableSanadCreate',
            'DonorReceivableSanadStore'
        ]);
    }


    public function createDonorSanads()
    {
        if(auth()->user()->can('read-sanad'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $sanads = CreateDonorSanad::where("establishment_id", $establishmentId)->orderBy('created_at', 'desc')->get();
            return view('sanads.createDonorSanad', compact('sanads'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function createDonorSanadPrint(CreateDonorSanad $createDonorSanad)
    {
        $result = $createDonorSanad;
        return view('sanads.createDonorSanadPrint', compact('result'));
    }

    public function destroyDonorSanads()
    {
        if(auth()->user()->can('read-sanad'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $sanads = DestroyDonorSanad::where("establishment_id", $establishmentId)->orderBy('created_at', 'desc')->get();
            return view('sanads.destroyDonorSanad', compact('sanads'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function destroyDonorSanadPrint(DestroyDonorSanad $destroyDonorSanad)
    {
        $result = $destroyDonorSanad;
        return view('sanads.destroyDonorSanadPrint', compact('result'));
    }

    public function IntervalReceivableSanad()
    {
        if(auth()->user()->can('read-sanad'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $sanads = IntervalReceivableSanad::where("establishment_id", $establishmentId)->orderBy('created_at', 'desc')->get();
            return view('sanads.IntervalReceivableSanad', compact('sanads'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function IntervalReceivableSanadPrint(IntervalReceivableSanad $intervalReceivableSanad)
    {
        if(auth()->user()->can('read-sanad'))
        {
            $result = $intervalReceivableSanad;
            return view('sanads.IntervalReceivableSanadPrint', compact('result'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function IntervalReceivableSanadCreate()
    {
        if(auth()->user()->can('read-sanad'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $intervals = Interval::all();
            $bank_accounts = BankAccount::where('establishment_id', $establishmentId)->get();
            return view('sanads.IntervalReceivableSanadCreate', compact('intervals', 'bank_accounts'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Store a newly created interval sanad in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function IntervalReceivableSanadStore(Request $request)
    {
        if(auth()->user()->can('create-sanad'))
        {
            $this->validate($request, [
                'bank_account_id' => 'required|integer',
                'interval_id' => 'required|integer'
            ]);
            $establishmentId = auth()->user()->establishment_id;
            $sanad = IntervalReceivableSanad::where('establishment_id', $establishmentId)
                ->where('interval_id', $request['interval_id'])
                ->where('bank_account_id', $request['bank_account_id'])
                ->first();
            if($sanad)
            {
                return redirect(route('sanads.IntervalReceivableSanad'))->with('data', ['alert'=>'سند هذة الفتره لهذا الحساب موجود بالفعل','alert-type'=>'warning']);
            }
            $total_amount = Operation::where('establishment_id', $establishmentId)
                ->where('interval_id', $request['interval_id'])
                ->where('bank_account_id', $request['bank_account_id'])
                ->where('success', true)
                ->sum('amount');
            IntervalReceivableSanad::create([
                'establishment_id' => $establishmentId,
                'interval_id' => $request['interval_id'],
                'bank_account_id' => $request['bank_account_id'],
                'sanad_number' => time(),
                'sanad_date' => Carbon::now()->toDateString(),
                'total_amount' => $total_amount,
                'process_number' => $establishmentId . time(),
                'user_id' => auth()->user()->id
            ]);

            return redirect(route('sanads.IntervalReceivableSanad'))->with('data', ['alert'=>'تم إنشاء السند بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function DonorReceivableSanad()
    {
        if(auth()->user()->can('read-sanad'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $sanads = DonorReceivableSanad::where("establishment_id", $establishmentId)->orderBy('created_at', 'desc')->get();
            return view('sanads.DonorReceivableSanad', compact('sanads'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function DonorReceivableSanadPrint(DonorReceivableSanad $donorReceivableSanad)
    {
        if(auth()->user()->can('read-sanad'))
        {
            $result = $donorReceivableSanad;
            return view('sanads.DonorReceivableSanadPrint', compact('result'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function DonorReceivableSanadCreate()
    {
        if(auth()->user()->can('create-sanad'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $intervals = Interval::all();
            $bank_accounts = BankAccount::where('establishment_id', $establishmentId)->get();
            $donors = Donor::where('establishment_id', $establishmentId)->get();
            return view('sanads.DonorReceivableSanadCreate', compact('donors', 'intervals', 'bank_accounts'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function DonorReceivableSanadStore(Request $request)
    {
        if(auth()->user()->can('create-sanad'))
        {
            $this->validate($request, [
                'bank_account_id' => 'required|integer',
                'interval_id' => 'required|integer',
                'donor_id' => 'required|integer'
            ]);
            $establishmentId = auth()->user()->establishment_id;
            $sanad = DonorReceivableSanad::where('establishment_id', $establishmentId)
                ->where('interval_id', $request['interval_id'])
                ->where('bank_account_id', $request['bank_account_id'])
                ->where('donor_id', $request['donor_id'])
                ->first();
            if($sanad)
            {
                return redirect(route('sanads.IntervalReceivableSanad'))->with('data', ['alert'=>'هذا المتبرع لدية سند لهذة الفتره وهذا الحساب بالفعل','alert-type'=>'warning']);
            }
            $amount = Operation::where('establishment_id', $establishmentId)
                ->where('interval_id', $request['interval_id'])
                ->where('bank_account_id', $request['bank_account_id'])
                ->where('donor_id', $request['donor_id'])
                ->where('success', true)
                ->sum('amount');
            $donor = Donor::find($request['donor_id']);

            DonorReceivableSanad::create([
                'establishment_id' => $establishmentId,
                'sanad_number' => time(),
                'sanad_date' => Carbon::now()->toDateString(),
                'amount' => $amount,
                'donor_id' => $request['donor_id'],
                'branch_id' => $donor->branch_id,
                'interval_id' => $request['interval_id'],
                'bank_account_id' => $request['bank_account_id'],
                'user_id' => auth()->user()->id
            ]);
            return redirect(route('sanads.DonorReceivableSanad'))->with('data', ['alert'=>'تم إنشاء السند بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
