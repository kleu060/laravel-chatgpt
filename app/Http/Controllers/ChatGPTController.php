<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ChatGPTController extends Controller
{
    //
    protected $httpClient;

    /**
     *  ChatGPTController constructor
     * 
     */
    public function __construct()
    {
        
    }

    /**
     * check if CHATGPT_API_KEY is dedfine in .env
     */
    public function checkConfig()
    {   
        if (!defined( config('services.chatgpt.key') ) && config('services.chatgpt.key') == "")
        {
            throw new \Exception("The applications is not correctly configured.");
        }
        return true;
    }

    /**
     * Create GuzzleHttp Client to connect to openai
     * 
     * @return GuzzleHttp $client
     */
    public function createClient()
    {

        $this->checkConfig();
        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.chatgpt.key'),
                'Content-Type' => 'application/json',
            ],
        ]);
        return $client;
        

    }

    /**
     *  Handle reference letter form submit
     * 
     *  @param Request $request
     */
    public function generate(Request $request)
    {
        
        $request->validate([
            'inputName' => 'required',
        ]);

        $today = date("Y-m-d");
        $skills = preg_replace('/\+\=\=\=\=\+/', ",", $request->submitSkill);
        $skills = rtrim($skills, ",");
        $address = $request->inputAddress.",".$request->inputAddress2.",".$request->inputCity.",".$request->inputZip.",".$request->inputCountry;
        $message = "My name is ".$request->inputName. ". ".$request->inputRole." role in ".$request->inputCompany.".  I have the follow skill sets ".$skills. ". I need a cover letter to apply for the role.  insert my mame, address , email that was given. Recipient's Name will be  '". $request->inputCompany." Hiring team'.  No need to say Certainly. You DO NOT need to add address section and email in the cover letter, just provide me the body section of the cover letter.  No need to put today date. ";

        // set true is debugging the app.  Prevent using chatgpt request to save cost
        $debug = config("services.chatgpt.debug_mode");
        if ($debug == "false"){
            // echo $message;
            echo "<br /><br />";
            try{
                $this->httpClient = $this->createClient();
                $response = $this->httpClient->post('chat/completions', [
                    'json' => [
                        'model' => 'gpt-3.5-turbo',
                        'messages' => [
                            ['role' => 'system', 'content' => 'You are'],
                            ['role' => 'user', 'content' => $message],
                        ],
                    ],
                ]);
                $data["title"] = "Your Cover Letter";
                $data["content"] =  preg_replace('/\n/', "<br />", json_decode($response->getBody(), true)['choices'][0]['message']['content'] );

            }
            catch (\GuzzleHttp\Exception\ClientException $e ){
                $data["title"] = "Error01";
                $data["error"] = "ChatAPI key is correct. ". $e->getMessage();
                return view("error", $data);
            }
            catch(\Exception $e){
                $data["title"] = "Error02";
                $data["error"] = "aa". $e->getMessage();
                return view("error", $data);
            }
        }
        else{
            $data["title"] = "Your Cover Letter";
            $data["content"] = "<br /><br /> Hiring team,<br /><br />This is a dummy cover letter.<br /><br />Sincerely,<br />Ka On";

        }


        return view("referenceletterresult", $data);
    }
    



    /**
     * This is a test function that send a test message to Chatgpt and get a response
     * 
     * return the message in a json format string
     */
    public function askToChatGpt()
    {
        $message = "what is laravel";


        $client = $this->createClient();
        $response = $client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are'],
                    ['role' => 'user', 'content' => $message],
                ],
            ],
        ]);

        print_r($response);
    }
}
