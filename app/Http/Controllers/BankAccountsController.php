<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BankAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BankAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-bankAccount')->only('index');
        $this->middleware('permission:create-bankAccount')->only('create');
        $this->middleware('permission:create-bankAccount')->only('store');
        $this->middleware('permission:read-bankAccount')->only('show');
        $this->middleware('permission:update-bankAccount')->only('edit');
        $this->middleware('permission:update-bankAccount')->only('update');
        $this->middleware('permission:delete-bankAccount')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-bankAccount'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $bankAccounts = BankAccount::where('establishment_id', $establishmentId)->get();
            return view('bank-accounts.index', compact('bankAccounts'));
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
        if(auth()->user()->can('create-bankAccount'))
        {
            $banks = Bank::all();
            return view('bank-accounts.create', compact('banks'));
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
        if(auth()->user()->can('create-bankAccount'))
        {
            $this->validate($request, [
                'bank_id' => 'required',
                'account_number' => 'required|numeric',
                'iban' => 'string|regex:/^SA([0-9]{22}$)/',
            ]);
            BankAccount::create([
                'establishment_id' => auth()->user()->establishment_id,
                'bank_id' => $request['bank_id'],
                'account_number' => $request['account_number'],
                'iban' => $request['iban'],
                'description' => $request['description']
            ]);
            return redirect('/bank-accounts')->with('data', ['alert'=>'تم اضافة الحساب البنكي بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param BankAccount $bank_account
     * @return Response
     */
    public function show(BankAccount $bank_account)
    {
        if(auth()->user()->can('read-bankAccount'))
        {
            return view('bank-accounts.show', compact('bank_account'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BankAccount $bank_account
     * @return Response
     */
    public function edit(BankAccount $bank_account)
    {
        if(auth()->user()->can('update-bankAccount'))
        {
            $banks = Bank::all();
            return view('bank-accounts.edit', compact('bank_account', 'banks'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BankAccount $bank_account
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, BankAccount $bank_account)
    {
        if(auth()->user()->can('update-bankAccount'))
        {
            $this->validate($request, [
                'bank_id' => 'required',
                'account_number' => 'required|numeric',
                'iban' => 'string|regex:/^SA([0-9]{22}$)/',
            ]);
            $bank_account->update($request->all());
            return redirect('/bank-accounts')->with('data', ['alert'=>'تم تحديث بيانات الحساب البنكي بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BankAccount $bank_account
     * @return Response
     * @throws Exception
     */
    public function destroy(BankAccount $bank_account)
    {
        if(auth()->user()->can('update-bankAccount'))
        {
            try {
                $bank_account->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/bank-accounts')->with('data', ['alert'=>'تم حذف بيانات الحساب البنكي بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
