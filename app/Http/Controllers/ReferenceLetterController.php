<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferenceLetterController extends Controller
{
    //
    public function index(){
        $data["title"] = "Genearte Reference Letter";
        return view("referenceletter", $data);
    }
}
