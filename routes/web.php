<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CalendarController;
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

Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('login-post',[AuthController::class, 'postLogin'])->name('login.post');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('post-register',[AuthController::class, 'postRegister'])->name('register.post');
Route::get('dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('calendar',[CalendarController::class,'index'])->name('calendar.index');
Route::view('cal','calendar.calendar');
