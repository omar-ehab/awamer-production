<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractStartEnd;
use Illuminate\Http\Response;

class ContractsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-contract')->only('index');
        $this->middleware('permission:read-contract')->only('printContract');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->hasRole(['super_admin', 'admin']))
        {
            if(auth()->user()->can('read-contract')) {

                if(auth()->user()->hasRole(['admin', 'super_admin']))
                {
                    $contracts = Contract::all();
                    $contracts = $contracts->filter(function($contract) {
                        return $contract->establishment_id != 1;
                    });
                } else {
                    $contracts = Contract::where('establishment_id', auth()->user()->establishment_id)->get();
                }
                return view('contracts.index', compact('contracts'));
            }
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param Contract $contract
     * @return Response
     */
    public function printContract(Contract $contract)
    {
        if(auth()->user()->can('read-contract')) {
            $contractStart = ContractStartEnd::where('type', 'start')->first();
            $contractEnd = ContractStartEnd::where('type', 'end')->first();
            $terms = $contract->terms;
            return view('contracts.print', compact('contract', 'terms', 'contractStart', 'contractEnd'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
