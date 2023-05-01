<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\controllerPage;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\skillController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\frontpageController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pageSettingsController;

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


Route::get('/',[frontpageController::class,"index"]);

Route::redirect('home', 'dashboard');

Route::get('/auth', [authcontroller::class, "index"])->name('login')->middleware('guest'); 
Route::get('/auth/redirect', [authcontroller::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authcontroller::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authcontroller::class, "logout"]);

Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/',[controllerPage::class,'index']);
        Route::resource('page', controllerPage::class);
        Route::resource('experience',experienceController::class);
        Route::resource('education',educationController::class);
        Route::get('skill',[skillController::class,'index'])->name('skill.index');
        Route::post('skill',[skillController::class,'update'])->name('skill.update');
        Route::get('profile',[profileController::class,'index'])->name('profile.index');
        Route::post('profile',[profileController::class,'update'])->name('profile.update');
        Route::get('pageSettings',[pageSettingsController::class,'index'])->name('pageSettings.index');
        Route::post('pageSettings',[pageSettingsController::class,'update'])->name('pageSettings.update');
    }
);