<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Composer;

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
Route::get('login', [HomeController::class,'login'] );
Route::post('login', [HomeController::class,'postLogin'] );
Route::get('logout', [HomeController::class,'logout'] );

Route::get('register', [HomeController::class,'register'] )->name('register');
Route::post('register', [HomeController::class,'postRegister'] )->name('postRegister');

Route::group(['prefix' => 'admin','middleware' => 'adminlogin'], function () {
    Route::get('show', [HomeController::class,'show']);
    Route::group(['prefix' => 'user'], function () {
        Route::get('show', [UserController::class,'show']);
        Route::get('add', [UserController::class,'add']);
        Route::post('add', [UserController::class,'postAdd']);
        Route::get('edit/{id}', [UserController::class,'edit']);
        Route::post('edit/{id}', [UserController::class,'postEdit']);
        Route::get('delete/{id}', [UserController::class,'delete']);
    });
});
