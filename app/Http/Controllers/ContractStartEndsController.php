<?php

namespace App\Http\Controllers;

use App\ContractStartEnd;
use Illuminate\Http\Request;

class ContractStartEndsController extends Controller
{
    public function updateStart(Request $request, ContractStartEnd $contractStart)
    {
        $this->validate($request, [
            'type' => 'required|in:start',
            'value' => 'required|string'
        ]);
        $contractStart->update($request->all());
        return redirect('/contract-terms')->with('data', ['alert'=>'تم تعديل مقدمة العقد بنجاح','alert-type'=>'success']);
    }

    public function updateEnd(Request $request, ContractStartEnd $contractEnd)
    {
        $this->validate($request, [
            'type' => 'required|in:end',
            'value' => 'required|string'
        ]);
        $contractEnd->update($request->all());
        return redirect('/contract-terms')->with('data', ['alert'=>'تم تعديل خاتمة العقد بنجاح','alert-type'=>'success']);
    }
}
