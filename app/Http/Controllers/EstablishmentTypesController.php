<?php

namespace App\Http\Controllers;

use App\EstablishmentType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class EstablishmentTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-establishmentType')->only('index');
        $this->middleware('permission:create-establishmentType')->only('create');
        $this->middleware('permission:create-establishmentType')->only('store');
        $this->middleware('permission:read-establishmentType')->only('show');
        $this->middleware('permission:update-establishmentType')->only('edit');
        $this->middleware('permission:update-establishmentType')->only('update');
        $this->middleware('permission:delete-establishmentType')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(auth()->user()->can('read-establishmentType'))
        {
            $establishmentTypes = EstablishmentType::all();
            return view('establishmentTypes.index', compact('establishmentTypes'));
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
        if(auth()->user()->can('create-establishmentType'))
        {
            return view('establishmentTypes.create');
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
        if(auth()->user()->can('create-establishmentType'))
        {
            $this->validate($request, [
                'name' => 'required|string'
            ]);
            EstablishmentType::create($request->all());
            return redirect('/establishment-types')->with('data', ['alert'=>'تم إضافة نوع الجهه بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param EstablishmentType $establishment_type
     * @return Response
     */
    public function show(EstablishmentType $establishment_type)
    {
        if(auth()->user()->can('read-establishmentType'))
        {
            return view('establishmentTypes.show', compact('establishment_type'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EstablishmentType $establishment_type
     * @return Response
     */
    public function edit(EstablishmentType $establishment_type)
    {
        if(auth()->user()->can('update-establishmentType'))
        {
            return view('establishmentTypes.edit', compact('establishment_type'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param EstablishmentType $establishment_type
     * @return Response
     */
    public function update(Request $request, EstablishmentType $establishment_type)
    {
        if(auth()->user()->can('update-establishmentType'))
        {
            $this->validate($request, [
                'name' => 'required|string'
            ]);
            $establishment_type->update($request->all());
            return redirect('/establishment-types')->with('data', ['alert'=>'تم تحديث نوع الجهه بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy(EstablishmentType $establishment_type)
    {
        if(auth()->user()->can('delete-establishmentType'))
        {
            try {
                $establishment_type->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/establishment-types')->with('data', ['alert'=>'تم حذف نوع الجهه بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
