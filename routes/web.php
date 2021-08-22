<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginWithGoogleController;
use App\Http\Controllers\Auth\LoginWithFacebookController;

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

Route::middleware('auth')->get('/', function () {
    return view('welcome');
});

Route::get('/testpage', function (){
    return view('testpage');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


//Socialize Google
Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

//Socialize Facebook
Route::get('authorized/facebook',[LoginWithFacebookController::class, 'redirectToFacebook']);
Route::get('authorized/facebook/callback',[LoginWithFacebookController::class, 'handleFacebookCallback']);
Route::get('authorized/facebook/remove',[LoginWithFacebookController::class, 'removeFacebookId']);
