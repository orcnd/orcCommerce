<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;
Route::get(
    '/', function () {
        return view('guest/home');
    }
)->name('home');

Route::any('/login', [\App\Http\Controllers\Guest\MainController::class,'login'])
->name('login');    
Route::get('/logout', [\App\Http\Controllers\Guest\MainController::class,'logout'])
->name('logout');   
Route::any('/register', [\App\Http\Controllers\Guest\MainController::class,'register'])
->name('register');

Route::name('manage.')
    ->prefix('manage')
    ->middleware(RoleMiddleware::class.':admin')
    ->group(
        function () {
            Route::get(
                '', function () {
                    return view('manage/home');
                }
            )->name('home');

            Route::resource(
                name: 'category', 
                controller: \App\Http\Controllers\Manage\CategoryController::class
            );
            Route::resource(
                name: 'product', 
                controller: \App\Http\Controllers\Manage\ProductController::class
            );

            Route::prefix('tag')->name('tag.')
                ->controller(\App\Http\Controllers\Manage\TagController::class)
                ->group(
                    function () {
                        Route::get('search', 'search')->name('search');
                        Route::post('store', 'store')->name('store');
                    }
                );
        }
    );



Route::get("/searchTag/{slug}", [\App\Http\Controllers\Manage\GeneralController::class,'searchTag'])
->name('searchTag');