<?php

namespace App\Http\Controllers;

use App\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $privacyPolicy = PrivacyPolicy::first();
            return view('privacyPolicies.index', compact('privacyPolicy'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function update(Request $request, PrivacyPolicy $privacyPolicy)
    {
        if(auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $this->validate($request, [
                'content' => 'required|string'
            ]);
            $privacyPolicy->update(['content' => $request['content']]);
            return redirect(route('privacyPolicy'))->with('data', ['alert'=>'تم تحديث الشروط والأحكام بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
