<?php

namespace App\Http\Controllers;

use App\ContractStartEnd;
use App\ContractTerm;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ContractTermsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-contractTerm')->only('index');
        $this->middleware('permission:create-contractTerm')->only('create');
        $this->middleware('permission:create-contractTerm')->only('store');
        $this->middleware('permission:read-contractTerm')->only('show');
        $this->middleware('permission:update-contractTerm')->only('edit');
        $this->middleware('permission:update-contractTerm')->only('update');
        $this->middleware('permission:delete-contractTerm')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-contractTerm'))
        {
            $contractTerms = ContractTerm::all();
            $contractStart = ContractStartEnd::where('type', 'start')->first();
            $contractEnd = ContractStartEnd::where('type', 'end')->first();
            return view('contract-terms.index', compact('contractTerms', 'contractStart', 'contractEnd'));
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
        if(auth()->user()->can('create-contractTerm'))
        {
            return view('contract-terms.create');
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
        if(auth()->user()->can('create-contractTerm'))
        {
            $this->validate($request, [
                'term' => 'required|string'
            ]);
            ContractTerm::create($request->all());
            return redirect('/contract-terms')->with('data', ['alert'=>'تم اضافة بند العقد بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param ContractTerm $contract_term
     * @return Response
     */
    public function show(ContractTerm $contract_term)
    {
        if(auth()->user()->can('read-contractTerm'))
        {
            return view('contract-terms.show', compact('contract_term'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContractTerm $contract_term
     * @return Response
     */
    public function edit(ContractTerm $contract_term)
    {
        if(auth()->user()->can('update-contractTerm'))
        {
            return view('contract-terms.edit', compact('contract_term'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ContractTerm $contract_term
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, ContractTerm $contract_term)
    {
        if(auth()->user()->can('update-contractTerm'))
        {
            $this->validate($request, [
                'term' => 'required|string'
            ]);
            $contract_term->update($request->all());
            return redirect('/contract-terms')->with('data', ['alert'=>'تم تحديث بند العقد بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ContractTerm $contract_term
     * @return Response
     * @throws Exception
     */
    public function destroy(ContractTerm $contract_term)
    {
        if(auth()->user()->can('delete-contractTerm'))
        {
            try {
                $contract_term->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/contract-terms')->with('data', ['alert'=>'تم حذف بند العقد بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
