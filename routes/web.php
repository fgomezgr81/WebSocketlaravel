<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use App\Htpp\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('chat/with/{user_id}', [ChatController::class,'chat_with'])->name('chat.with');

Route::get('chat/{chat_id}', [ChatController::class,'show'])->name('chat.show');

Route::post('message/sent', [MessageController::class,'sent'])->name('message.sent');
