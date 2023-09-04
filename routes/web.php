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

// Route::get('/', function () {
//     return view('wrabbit-welcome');
// });

Route::get('/', 'App\Http\Controllers\RegisterController@index')->name('/');

Route::post("/generate-magic-link", "App\Http\Controllers\RegisterController@generateMagicLink")->name("generate-magic-link");

Route::get('/magic-link-login', 'App\Http\Controllers\RegisterController@loginWithMagicLink')->name('magic-link-login');

Route::post('/create-user', 'App\Http\Controllers\RegisterController@createUser')->name('create-user');

Route::middleware(['auth'])->group(function () {
    Route::get('/in-login', 'App\Http\Controllers\RegisterController@inLogin')->name('in-login');
    Route::get('/in-logout', 'App\Http\Controllers\RegisterController@inLogout')->name('in-logout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
