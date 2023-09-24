<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/coverletter',[App\Http\Controllers\CoverLetterController::class, 'index'])->middleware('checkChatGPT')->name("CoverLetter");
Route::post('/createPDF',[App\Http\Controllers\CoverLetterController::class, 'createPDF'])->middleware('checkChatGPT')->name("createPDF");
Route::post('/generate', [App\Http\Controllers\ChatGPTController::class, 'generate'])->middleware('checkChatGPT')->name("generate");

Route::get('/chat', [App\Http\Controllers\ChatGPTController::class, 'askToChatGpt'])->name("chat");
