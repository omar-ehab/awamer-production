<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;

class ReportsController extends Controller
{




   public function get_disabled_donors(Request $request){
   	$donors=\App\Donor::where('establishment_id',\Auth::user()->establishment->id)->orderBy('id','DESC')->paginate(50);
   	return view('reports.disabled-donors',compact('donors'));
   }



   public function get_fixed_interval_view(Request $request){
   	$intervals=\App\Interval::all();
   	return view('reports.fixed-interval-init',compact('intervals'));
   }


   public function get_fixed_interval(Request $request){

   	$request->validate(['id'=>'required|numeric|min:0']);
      return redirect('/reports/fixed-interval/'.$request->id);

   }

   public function get_fixed_interval_x(Request $request){
      /*$request->validate(['id'=>'required|numeric|min:0']);*/
      $operations=\App\Operation::where('interval_id',$request->id)->paginate(50);
      return view('reports.fixed-interval',compact('operations'));

   }


   public function get_succeed_operations(Request $request){


      /*$operations=\App\Operation::where('success',true)->where('establishment_id',\Auth::user()->establishment->id)->get()->toArray();


      return Excel::create('itsolutionstuff_example', function($excel) use ($operations) {
      $excel->sheet('mySheet', function($sheet) use ($operations)
       {
         $sheet->fromArray($operations);
       });
      })->download("pdf");
      $pdf = PDF::loadView('reports.succeed-operations', $operations);
      $pdf->save(storage_path().'_filename.pdf');
      return $pdf->download(storage_path().'_filename.pdf');

      */


      $operations=\App\Operation::where('success',true)->where('establishment_id',\Auth::user()->establishment->id)->paginate(100);






      return view('reports.succeed-operations',compact('operations'));
   }



   public function get_failed_operations(Request $request){
      $operations=\App\Operation::where('success',false)->where('establishment_id',\Auth::user()->establishment->id)->paginate(100);
      return view('reports.failed-operations',compact('operations'));
   }

   public function excel_sheet_download(Request $request){
      if(file_exists(public_path().'excel'.$request->path_name))
      return file_get_contents(public_path().'excel'.$request->path_name   );
     return redirect()->back()->with('data', ['alert'=>'لم يتم العثور علي ملف  ','alert-type'=>'danger']);
   }












}
