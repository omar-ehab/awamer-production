<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class ExportPDF extends Controller
{
     public function export_pdf_users(Request $request)
     {
     	$items = \App\Bank::get()->toArray();
     	$pdf = PDF::loadView('pdf.items', compact('items'));
     	//$pdf->save(storage_path().'_filename.pdf'); 
     	return $pdf->download('items.pdf');
     }
     
}
