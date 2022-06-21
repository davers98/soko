<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BusinessController;
use App\Http\Controllers\API\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::get('products', [ProductController::class, 'product']);

Route::post('products', [ProductController::class, 'store']);

Route::get('products/{id}', [ProductController::class, 'show']);

Route::get('business', [BusinessController::class, 'business']);

Route::post('business', [BusinessController::class, 'store']);

Route::get('users', [UserController::class, 'index']);

Route::post('users', [UserController::class, 'store']);

//Route::get('')

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
