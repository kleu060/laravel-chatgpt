<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\ChatGPTController;


class CheckChatGPT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $chatGPT = new ChatGPTController();
        try{
            $chatGPT->checkConfig();
        }
        catch(\Exception $e){
            $data["title"] = "Error";
            $data["error"] = $e->getMessage();
            return response()->view("error", $data);
        }
        return $next($request);
    }
}
