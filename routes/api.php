<?php
/**
 * API Routes
 * 
 * PHP version 8.2
 *
 * @category  Route
 * @package   App\Http\Controllers
 * @author    Orcun Candan <orcuncandan@gmail.com>
 * @copyright 2024 Orcun Candan
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/orcuncandan/orcCommerce
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(
    function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::get('/me', 'me')->middleware('auth:sanctum');
    }   
);


Route::middleware('auth:sanctum')->group(
    function () {
        Route::apiResources(
            [
            'admin/categories' => \App\Http\Controllers\CategoryController::class,
            ]
        );
    }
);
