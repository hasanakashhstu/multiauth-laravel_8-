<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [App\Http\Controllers\AdminController::class, 'authenticated'])->name('admin.auth');
    });
    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/deshboard', [App\Http\Controllers\DeshboardController::class, 'deshboard'])->name('admin.deshboard');
        Route::post('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    });
});
