<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorktimeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StampController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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
Route::group(['middleware'=>'auth'],function()
{

    Route::post('/start',[StampController::class,'start']);

    Route::patch('/end',[StampController::class,'end']);

    Route::post('/break_in',[StampController::class,'break_in']);

    Route::patch('/break_out',[StampController::class,'break_out']);

    Route::get('user/list',[WorktimeController::class,'list'])->name('list');

});

Route::get('/',[WorktimeController::class,'index'])->name('login');

Route::get('/login',[LoginController::class,'index']);

Route::get('/register',[LoginController::class,'register']);

Route::post('/register/store',[LoginController::class,'store']);

Route::post('/login/login',[LoginController::class,'login']);

Route::post('/logout',[LoginController::class,'logout']);

Route::get('/attendance/{date?}',[WorktimeController::class,'attendance'])->name('attendance');

Route::get('/user/{id?}/{date?}', [WorktimeController::class, 'user'])->name('user');

Route::get('/verify/{name}/{email}', [LoginController::class, 'verify'])->name('verify');
