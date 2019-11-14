<?php

namespace App\Http\Controllers;

use App\Interval;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class IntervalsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read-interval')->only('index');
        $this->middleware('permission:create-interval')->only('create');
        $this->middleware('permission:create-interval')->only('store');
        $this->middleware('permission:read-interval')->only('show');
        $this->middleware('permission:update-interval')->only('edit');
        $this->middleware('permission:update-interval')->only('update');
        $this->middleware('permission:delete-interval')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-interval'))
        {
            $intervals = Interval::all();
            return view('intervals.index', compact('intervals'));
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
        if(auth()->user()->can('create-interval'))
        {
            return view('intervals.create');
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
        if(auth()->user()->can('create-interval'))
        {
            $this->validate($request, [
                'name' => 'required|string',
                'start' => 'required|date',
                'end' => 'required|date|after:start'
            ]);
            Interval::create([
                'name' => $request['name'],
                'start' => Carbon::parse($request['start'])->toDateString(),
                'end' => Carbon::parse($request['end'])->toDateString()
            ]);
            return redirect('/intervals')->with('data', ['alert'=>'تم اضافة الفتره بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param Interval $interval
     * @return Response
     */
    public function show(Interval $interval)
    {
        if(auth()->user()->can('read-interval'))
        {
            return view('intervals.show', compact('interval'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Interval $interval
     * @return Response
     */
    public function edit(Interval $interval)
    {
        if(auth()->user()->can('update-interval'))
        {
            return view('intervals.edit', compact('interval'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Interval $interval
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Interval $interval)
    {
        if(auth()->user()->can('update-interval'))
        {
            $this->validate($request, [
                'name' => 'required|string',
                'start' => 'required|date',
                'end' => 'required|date|after:start'
            ]);
            $request['start'] = Carbon::parse($request->start)->toDateString();
            $request['end'] = Carbon::parse($request->end)->toDateString();
            $interval->update($request->all());
            return redirect('/intervals')->with('data', ['alert'=>'تم تعديل الفتره بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Interval $interval
     * @return Response
     * @throws Exception
     */
    public function destroy(Interval $interval)
    {
        if(auth()->user()->can('delete-interval'))
        {
            try {
                $interval->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/intervals')->with('data', ['alert'=>'تم حذف الفترة بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
