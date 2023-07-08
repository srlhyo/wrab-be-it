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
    return view('wrabbit-welcome');
});
// dd("hey I am coming from web route");
// Route::post('/send-welcome-email', 'App\Http\Controllers\EmailController@sendWelcomeEmail')->name('send-email');
Route::post("/send-email", "App\Http\Controllers\RegisterController@sendEmail")->name("send-email");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
