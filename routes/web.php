<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\controllerPage;
use Laravel\Socialite\Facades\Socialite;

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

Route::redirect('home', 'dashboard');

Route::get('/auth', [authcontroller::class, "index"])->name('login')->middleware('guest'); 
Route::get('/auth/redirect', [authcontroller::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authcontroller::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authcontroller::class, "logout"]);

Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/',[controllerPage::class,'index']);
        Route::resource('page', controllerPage::class);
    }
);