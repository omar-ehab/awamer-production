<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\AdministrativeArea;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdministrativeAreasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-administrativeArea')->only('index');
        $this->middleware('permission:create-administrativeArea')->only('create');
        $this->middleware('permission:create-administrativeArea')->only('store');
        $this->middleware('permission:read-administrativeArea')->only('show');
        $this->middleware('permission:update-administrativeArea')->only('edit');
        $this->middleware('permission:update-administrativeArea')->only('update');
        $this->middleware('permission:delete-administrativeArea')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-administrativeArea'))
        {
            $administrativeAreas = AdministrativeArea::all();
            return view('administrativeAreas.index', compact('administrativeAreas'));
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
        if(auth()->user()->can('create-administrativeArea'))
        {
            return view('administrativeAreas.create');
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
        if(auth()->user()->can('create-administrativeArea'))
        {
            $this->validate($request, [
                'name' => 'required|string'
            ]);
            AdministrativeArea::create($request->all());
            return redirect('/administrative-areas')->with('data', ['alert'=>'تم إنشاء منطقة ادارية بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  AdministrativeArea  $administrative_area
     * @return Response
     */
    public function show(AdministrativeArea $administrative_area)
    {
        return view('administrativeAreas.show', compact('administrative_area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AdministrativeArea  $administrative_area
     * @return Response
     */
    public function edit(AdministrativeArea $administrative_area)
    {
        if(auth()->user()->can('update-administrativeArea'))
        {
            return view('administrativeAreas.edit', compact('administrative_area'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AdministrativeArea $administrative_area
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, AdministrativeArea $administrative_area)
    {
        if(auth()->user()->can('update-administrativeArea'))
        {
            $this->validate($request, [
                'name' => 'required|string'
            ]);
            $administrative_area->update($request->all());
            return redirect('/administrative-areas')->with('data', ['alert'=>'تم تحديث المنطقة الأدارية بنجاح','alert-type'=>'success']);

        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AdministrativeArea $administrative_area
     * @return Response
     * @throws Exception
     */
    public function destroy(AdministrativeArea $administrative_area)
    {
        if(auth()->user()->can('delete-administrativeArea'))
        {
            try {
                $administrative_area->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/administrative-areas')->with('data', ['alert'=>'تم حذف المنطقة الأدارية بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
