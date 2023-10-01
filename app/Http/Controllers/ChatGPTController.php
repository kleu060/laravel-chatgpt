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
        // echo "abc: " . env('CHATGPT_API_KEY');
        if (!defined( env('CHATGPT_API_KEY') ) && env('CHATGPT_API_KEY') == "")
        {
            // echo env('CHATGPT_API_KEY');
            throw new \Exception("The applications is not correctly configured.");
        }
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
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
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
        $debug = false;
        if ($debug == false){
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
            $data["content"] = "<br /><br />TWC Hiring team,<br /><br />I am writing to express my interest in the PHP Developer role at TWC. With a strong background in PHP and expertise in Laravel, I am confident in my ability to contribute to the success of your team.<br /><br />As a PHP Developer with experience in building and maintaining complex web applications, I am well-versed in the principles of clean code and object-oriented programming. I have a deep understanding of PHP frameworks and have successfully implemented Laravel in multiple projects, delivering high-quality solutions within tight deadlines.<br /><br />I am skilled in developing efficient and scalable web applications, using my understanding of database management systems, AJAX, and RESTful APIs. Additionally, my familiarity with front-end technologies such as HTML, CSS, and JavaScript allows me to work effectively in full-stack development environments.<br /><br />Throughout my career, I have proven my ability to collaborate effectively with cross-functional teams to identify and resolve technical issues. I am a detail-oriented professional who takes great pride in writing well-tested and maintainable code.<br /><br />Furthermore, I am constantly striving to learn and stay up-to-date with the latest industry trends and best practices. I believe in the importance of continuously improving my skills and staying ahead in a rapidly evolving field like web development.<br /><br />Thank you for considering my application for the PHP Developer role at TWC. I am eager to contribute my technical skills and passion for coding to your team. I am confident that my experience and expertise make me a strong candidate for this position.<br /><br />I look forward to the opportunity to discuss further how my skills align with TWC's goals and how I can contribute to the continued success of your organization.<br /><br />Sincerely,<br />Ka On";

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
        $response = $this->httpClient->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are'],
                    ['role' => 'user', 'content' => $message],
                ],
            ],
        ]);
    }
}
