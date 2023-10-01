<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class CoverLetterController extends Controller
{

    /**
     * Display Cover Letter form
     * 
     * @return View cover letter form
     * 
     */
    public function index(){
        
        $data["title"] = "Genearte Cover Letter";
        return view("coverletter", $data);
    }

    /**
     * Generate PDF
     * 
     * @param Request $request
     * @return Response download PDF
     * 
     */
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
