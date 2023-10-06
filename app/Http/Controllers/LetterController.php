<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response    ;
use App\Models\Letter;
use Illuminate\View\View;


class LetterController extends Controller
{
    
    /**
     * View Cover letter
     * 
     * @param Request $request
     * @param int $id
     * 
     */
    public function viewLetter(Request $request,int $id): View
    {
        $letter = Letter::find($id);
        $data["letter"] = $letter;
        $data["title"] = "Your Cover Letter";
        $data["content"] = html_entity_decode($letter->content);

        $content= html_entity_decode($letter->content);
        $content = preg_replace('/<br>/', '<br />', $content);
        $content =  htmlspecialchars_decode($content);
        
        $data["content"] = $content;
        return view("referenceletterresult", $data); 
    }


    /**
     * List all the Cover Letter that was previously saved
     * @param Request $request
     * 
     */
    public function listLetter(Request $request): View
    {
        $user = $request->user();
        $letters = Letter::where("user_id" , $user->id)->get();
        print_r( $user->id);
        $data["letters"] = $letters;
        return view("history", $data);
    }


    /**
     * Save cover letter to database
     * @param Request $request
     * 
     */
    public function saveLetter(Request $request): Response
    {
        $user = $request->user();
        $content = $request->content;

        $letter = new Letter;
        $letter->user_id = $user->id;
        $letter->content = htmlentities($content);
        $letter->save();

        return response('Letter Saved!', 200)->header('Content-Type', 'text/plain');

    }
}
