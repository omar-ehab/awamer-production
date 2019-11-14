<?php

namespace App\Http\Controllers;

use App\SmsProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use SoapClient;



class SmsProvidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-smsProvider')->only('index');
        $this->middleware('permission:create-smsProvider')->only('create');
        $this->middleware('permission:create-smsProvider')->only('store');
        $this->middleware('permission:read-smsProvider')->only('show');
        $this->middleware('permission:update-smsProvider')->only('edit');
        $this->middleware('permission:update-smsProvider')->only('update');
        $this->middleware('permission:delete-smsProvider')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-smsProvider'))
        {
            $smsProviders = SmsProvider::all();
            return view('sms-providers.index', compact('smsProviders'));
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
        if(auth()->user()->can('create-smsProvider'))
        {
            return view('sms-providers.create');
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
        if(auth()->user()->can('create-smsProvider'))
        {
            $this->validate($request, [
                'provider_name' => 'required|string',
                'username' => 'required|string',
                'password' => 'required|string',
                'token' => 'required|string',
            ]);
            SmsProvider::create($request->all());
            return redirect('/sms-providers')->with('data', ['alert'=>'تم إضافة مزود خدمة رسائل نصية بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param SmsProvider $sms_provider
     * @return Response
     */
    public function show(SmsProvider $sms_provider)
    {
        if(auth()->user()->can('read-smsProvider'))
        {
            return view('sms-providers.show', $sms_provider);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SmsProvider $sms_provider
     * @return Response
     */
    public function edit(SmsProvider $sms_provider)
    {
        if(auth()->user()->can('update-smsProvider'))
        {
            return view('sms-providers.edit', compact('sms_provider'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SmsProvider $sms_provider
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, SmsProvider $sms_provider)
    {
        if(auth()->user()->can('update-smsProvider'))
        {
            $this->validate($request, [
                'provider_name' => 'required|string',
                'username' => 'required|string',
                'password' => 'required|string',
                'token' => 'required|string',
            ]);
            $sms_provider->update($request->all());
            return redirect('/sms-providers')->with('data', ['alert'=>'تم تحديث مزود خدمة رسائل نصية بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SmsProvider $sms_provider
     * @return Response
     * @throws Exception
     */
    public function destroy(SmsProvider $sms_provider)
    {
        if(auth()->user()->can('delete-smsProvider'))
        {
            try {
                $sms_provider->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/sms-providers')->with('data', ['alert'=>'تم حذف مزود خدمة رسائل نصية بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function activeSmsProvider(SmsProvider $sms_provider)
    {
        if(auth()->user()->can('update-smsProvider'))
        {
            if(SmsProvider::where('id', '>', 0)->update(['active' => 0]))
            {
                $sms_provider->update(['active' => 1]);
                return redirect('/sms-providers')->with('data', ['alert'=>'تم تفعيل مزود خدمة رسائل نصية بنجاح','alert-type'=>'success']);
            }
            return redirect('/sms-providers')->with('data', ['alert'=>'حدث خطأ اثناء التفعيل برجاء المحاوله في وقت لاحق','alert-type'=>'danger']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
