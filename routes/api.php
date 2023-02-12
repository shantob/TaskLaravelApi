<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=> 'auth:sanctum'], function(){
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/profile', [ProfileController::class, 'store']);
    Route::get('/index', [ProfileController::class, 'index']);
    Route::get('/show/{id}', [ProfileController::class, 'show']);
});


