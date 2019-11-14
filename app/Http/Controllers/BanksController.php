<?php

namespace App\Http\Controllers;

use App\Bank;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BanksController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-bank')->only('index');
        $this->middleware('permission:create-bank')->only('create');
        $this->middleware('permission:create-bank')->only('store');
        $this->middleware('permission:read-bank')->only('show');
        $this->middleware('permission:update-bank')->only('edit');
        $this->middleware('permission:update-bank')->only('update');
        $this->middleware('permission:delete-bank')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-bank'))
        {
            $banks = Bank::all();
            return view('banks.index', compact('banks'));
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
        if(auth()->user()->can('create-bank'))
        {
            return view('banks.create');
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


        if(auth()->user()->can('create-bank'))
        {
            $this->validate($request, [
                'name' => 'required|string',
                'amount_col'=> 'required|Alpha|max:1|min:1',
                'donation_date_col'=> 'required|Alpha|max:1|min:1',
                'bank_account_number_col'=> 'required|Alpha|max:1|min:1',
                'read_from_row'=>'required|max:1|min:1'
            ]);

            $request->merge(
                [
                    'amount_col' => $this->charToNumber($request->amount_col) - 1,
                    'donation_date_col'=>$this->charToNumber($request->donation_date_col) - 1,
                    'bank_account_number_col'=>$this->charToNumber($request->bank_account_number_col) - 1,
                ]
            );

            Bank::create($request->all());
            return redirect('/banks')->with('data', ['alert'=>'تم إضافة بنك بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Bank $bank
     * @return Response
     */
    public function show(Bank $bank)
    {
        return view('banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bank $bank
     * @return Response
     */
    public function edit(Bank $bank)
    {


        if(auth()->user()->can('update-bank'))
        {

            return view('banks.edit', compact('bank'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bank $bank
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Bank $bank)
    {
        if(auth()->user()->can('update-bank'))
        {
            $this->validate($request, [
                'name' => 'required|string',
                'amount_col'=> 'required|Alpha|max:1|min:1',
                'donation_date_col'=> 'required|Alpha|max:1|min:1',
                'bank_account_number_col'=> 'required|Alpha|max:1|min:1',
                'read_from_row'=>'required|max:1|min:1',
            ]);

            $request->merge(
                [
                    'amount_col' => $this->charToNumber($request->amount_col) -1,
                    'donation_date_col'=>$this->charToNumber($request->donation_date_col) - 1,
                    'bank_account_number_col'=>$this->charToNumber($request->bank_account_number_col) - 1,
                ]
            );
            $bank->update($request->all());
            return redirect('/banks')->with('data', ['alert'=>'تم تحديث البنك بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Bank $bank
     * @return Response
     * @throws Exception
     */
    public function destroy(Bank $bank)
    {
        if(auth()->user()->can('delete-bank'))
        {
            try {
                $bank->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/banks')->with('data', ['alert'=>'تم حذف البنك بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    private function charToNumber($char)
    {
        if ($char)
            return ord(strtolower($char)) - 96;
        else
            return 0;
    }
}
