<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('profile', [App\Http\Controllers\UserController::class, 'destroy'])->name('profile')->middleware('auth');

Route::get('profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile')->middleware('auth');

Route::post('profile', [App\Http\Controllers\UserController::class, 'update'])->name('profile')->middleware('auth');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('auth');
