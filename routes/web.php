<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::post('/register',[AuthController::class,'register']);
//Route::post('/login',[AuthController::class,'login']);
//Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/store', [FormController::class,'create'])->name('form');
