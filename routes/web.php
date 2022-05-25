<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;

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



   // Route::get('/', HomeController::)
Route::get('home', function(){
   return view('home.home');
});

Route::get('dashboard', function () {
    return view('home.admin');
});

    //Route::group(['middleware'=> ['guest'] ])
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('register',[AuthController::class, 'storeRegister'])->name('register.storeRegister');

    Route::get('login',[AuthController::class, 'login'])->name('login');
    Route::post('login',[AuthController::class, 'storeLogin'])->name('login.storeLogin');

    Route::get('logout',[AuthController::class, 'logout'])->name('logout');


    Route::post('product',[ProductController::class, 'addProduct'])->name('product.addProduct');
    Route::get('product', [ProductController::class, 'product'])->name('product');




