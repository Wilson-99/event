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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('events/{id}', [App\Http\Controllers\EventsController::class, 'event']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('profile/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('profile')->middleware('auth');

Route::get('profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile')->middleware('auth');

Route::put('profile', [App\Http\Controllers\UserController::class, 'update'])->name('profile')->middleware('auth');

Route::get('users', [App\Http\Controllers\UserController::class, 'show'])->name('users')->middleware('auth');

Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete')->middleware('auth');

Route::put('user/edit/update/{user}', [App\Http\Controllers\UserController::class, 'update1'])->name('update1')->middleware('auth');

Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user/create')->middleware('auth');

Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user/store')->middleware('auth');

Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user/edit')->middleware('auth');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('auth');

Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin/create')->middleware('auth');

Route::post('admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin/store')->middleware('auth');

Route::get('admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin/edit')->middleware('auth');

Route::put('admin/update/{task}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin/update')->middleware('auth');

Route::delete('admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin/delete')->middleware('auth');

Route::get('events', [App\Http\Controllers\EventsController::class, 'index'])->name('events')->middleware('auth');

Route::get('edit/{id}', [App\Http\Controllers\EventsController::class, 'edit'])->name('edit')->middleware('auth');

Route::delete('delete/{id}', [App\Http\Controllers\EventsController::class, 'destroy'])->name('delete')->middleware('auth');

Route::put('edit/update/{id}', [App\Http\Controllers\EventsController::class, 'update'])->name('update')->middleware('auth');

Route::get('create', [App\Http\Controllers\EventsController::class, 'create'])->name('create')->middleware('auth');

Route::post('store', [App\Http\Controllers\EventsController::class, 'store'])->name('store')->middleware('auth');

Route::post('/events/join/{id}', [App\Http\Controllers\EventsController::class, 'joinEvent'])->middleware('auth');

Route::delete('/events/leave/{id}', [App\Http\Controllers\EventsController::class, 'leaveEvent'])->middleware('auth');

Route::get('reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports')->middleware('auth');

Route::get('painel', [App\Http\Controllers\HomeController::class, 'painel'])->name('painel')->middleware('auth');

Route::get('view/{id}', [App\Http\Controllers\EventsController::class, 'view'])->name('view')->middleware('auth');

