<?php

namespace App\Http\Controllers;

use App\Establishment;
use App\Interval;
use App\SystemFee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SystemFeesController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'start' => 'date',
            'end' => 'date|after:start'
        ]);
        //final result
        $results = array();
        //all establishments
        $establishments = Establishment::where('id', '>', 1)->with('fees')->get();

        $start = $request['start'];
        $end = $request['end'];

        foreach ($establishments as $establishment)
        {
            //array to hold establishment and there fees with other data
            $establishmentFees = array();
            array_push($establishmentFees, ['name' => $establishment->name]);
            //calculate fees
            if($request['start'] && $request['end']) {
                $fees = $establishment->fees->where('paid', 0)->where('fee_date', '>=', Carbon::parse($request['start']))->where('fee_date', '<=', Carbon::parse($request['end']));
            } elseif ($request['start'] && $request['end'] == null) {
                $fees = $establishment->fees->where('paid', 0)->where('fee_date', '>=', Carbon::parse($request['start']));
            } elseif ($request['start'] == null && $request['end']) {
                $fees = $establishment->fees->where('paid', 0)->where('fee_date', '>=', Carbon::parse($request['end']));
            } else {
                $fees = $establishment->fees->where('paid', 0);
            }
            //dd($fees);

            array_push($establishmentFees, $fees);
            //push final array
            array_push($results, $establishmentFees);
        }
        //dd($results[0][1]->first()->id);
        return view('SystemFees.index', compact('results', 'start', 'end'));
    }

    public function payFees(Request $request)
    {
        $request['fees_ids'] = substr($request['fees_ids'], 0, -1);
        $request['fees_ids'] = explode(',', $request['fees_ids']);
        $fees =SystemFee::find($request['fees_ids']);
        //dd($fees);
        foreach ($fees as $fee)
        {
            $fee->update([
               'paid' => true,
            ]);
        }
        return redirect(route('systemFees'))->with('data', ['alert'=>'تم سداد المبلغ','alert-type'=>'success']);
    }
}
