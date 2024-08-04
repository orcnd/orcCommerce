<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(
    function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login')->name('login');
        Route::get('/me', 'me')->middleware('auth:sanctum');
    }   
);
