<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReferenceLetterController extends Controller
{

    //
    public function index(){
        $data["title"] = "Genearte Reference Letter";
        return view("referenceletter", $data);
    }

    // Generate PDF
    public function createPDF(Request $request) {

        $data["content"] = $request->content;
        // $data["content"] = "hello <br /> Hello";
        $pdf = PDF::loadView('pdf', $data);
        $fileName =  time().'.'. 'pdf' ;
        $pdf->save(public_path() . '/' . $fileName);
        $pdf = public_path($fileName);
        return response()->download($pdf);

    }
}
