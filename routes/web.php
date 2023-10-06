<?php

use App\Http\Controllers\ProfileController;
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
    // return view('welcome');
    return redirect(route("login"));
});

Route::get('/coverletter',[App\Http\Controllers\CoverLetterController::class, 'index'])->middleware(['auth', 'verified','checkChatGPT'])->name("CoverLetter");
// Route::get('/coverletter', function () {
//     return view('coverletter');
// })->middleware(['auth', 'verified', 'checkChatGPT'])->name('CoverLetter');

Route::post('/createPDF',[App\Http\Controllers\CoverLetterController::class, 'createPDF'])->middleware('checkChatGPT')->name("createPDF");
Route::post('/generate', [App\Http\Controllers\ChatGPTController::class, 'generate'])->middleware('checkChatGPT')->name("generate");

Route::get('/chat', [App\Http\Controllers\ChatGPTController::class, 'askToChatGpt'])->name("chat");
Route::get('/list-letter', [App\Http\Controllers\LetterController::class, 'listLetter'])->name("ListLetter");
Route::post('/save-letter', [App\Http\Controllers\LetterController::class, 'saveLetter'])->name("SaveLetter");
Route::get('/view-letter/{id}', [App\Http\Controllers\LetterController::class, 'viewLetter'])->name("ViewLetter");




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


