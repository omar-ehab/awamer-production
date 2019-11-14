<?php

namespace App\Http\Controllers;

use App\Branch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BranchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-branch')->only('index');
        $this->middleware('permission:create-branch')->only('create');
        $this->middleware('permission:create-branch')->only('store');
        $this->middleware('permission:read-branch')->only('show');
        $this->middleware('permission:update-branch')->only('edit');
        $this->middleware('permission:update-branch')->only('update');
        $this->middleware('permission:delete-branch')->only('destroy');
    }

    public function index()
    {
        if(auth()->user()->can('read-branch'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $branches = Branch::where('establishment_id', $establishmentId)->get();
            return view('branches.index', compact('branches'));
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
        if(auth()->user()->can('create-branch'))
        {
            return view('branches.create');
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
        if(auth()->user()->can('create-branch'))
        {
            $establishmentId = auth()->user()->establishment_id;
            $this->validate($request, [
                'name' => 'required|string',
                'address' => 'string'
            ]);
            Branch::create([
                'establishment_id' => $establishmentId,
                'name' => $request['name'],
                'address' => $request['address']
            ]);
            return redirect('/branches')->with('data', ['alert'=>'تم إنشاء الفرع بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Branch  $branch
     * @return Response
     */
    public function show(Branch $branch)
    {
        $establishmentId = auth()->user()->establishment_id;
        if(auth()->user()->can('read-branch') && $branch->establishment_id == $establishmentId)
        {
            return view('branches.show', compact('branch'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Branch  $branch
     * @return Response
     */
    public function edit(Branch $branch)
    {
        $establishmentId = auth()->user()->establishment_id;
        if(auth()->user()->can('update-branch') && $branch->establishment_id == $establishmentId)
        {
            return view('branches.edit',compact('branch'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Branch $branch
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Branch $branch)
    {
        $establishmentId = auth()->user()->establishment_id;
        if(auth()->user()->can('update-branch') && $branch->establishment_id == $establishmentId)
        {
            $this->validate($request, [
                'name' => 'required|string',
                'address' => 'string'
            ]);
            $branch->update($request->all());
            return redirect('/branches')->with('data', ['alert'=>'تم تحديث بيانات الفرع بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return Response
     * @throws Exception
     */
    public function destroy(Branch $branch)
    {
        $establishmentId = auth()->user()->establishment_id;
        if(auth()->user()->can('delete-branch') && $branch->establishment_id == $establishmentId)
        {
            try {
                $branch->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/branches')->with('data', ['alert'=>'تم حذف الفرع بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
}
