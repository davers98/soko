<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCategories;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Products;
use App\Models\Business;
use App\Models\User;
use App\Http\Controllers\BusinessController;

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
        $url[] = 'dashboard/products/edit/{id}';
        $business = Business::count();
        $products = Products::count();
        $count = Products::count();
        $users = User::count();
    return view('home.admin',compact('products', 'count', 'users','business'));
});

    //Route::group(['middleware'=> ['guest'] ])
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('register',[AuthController::class, 'storeRegister'])->name('register.storeRegister');
    Route::put('dashboard/users/update/{id}', [AuthController::class, 'update']);

    Route::get('login',[AuthController::class, 'login'])->name('login');
    Route::post('login',[AuthController::class, 'storeLogin'])->name('login.storeLogin');

    Route::get('logout',[AuthController::class, 'logout'])->name('logout');


    Route::post('dashboard/products',[ProductController::class, 'addProduct'])->name('product.addProduct');
    Route::get('dashboard/products', [ProductController::class, 'product'])->name('product');

    Route::get('dashboard/categories', [ProductCategories::class, 'category'])->name('categories');
    Route::post('dashboard/categories', [ProductCategories::class, 'store'])->name('categories.store');


    Route::get('dashboard/products/edit/{id}', [ProductController::class, 'edit']);
    Route::put('dashboard/products/update/{id}',[ProductController::class, 'update']);


    Route::delete('dashboard/products/delete/{id}', [ProductController::class, 'destroy']);
    Route::delete('dashboard/category/delete/{id}', [ProductCategories::class, 'destroy']);

    Route::get('dashboard/categories/edit/{id}', [ProductCategories::class, 'edit']);
    Route::put('dashboard/categories/update/{id}',[ProductCategories::class, 'update']);

    Route::get('dashboard/users', [UserController::class, 'index'])->name('users');

    Route::get('dashboard/business', [BusinessController::class, 'index'])->name('business');
    Route::post('dashboard/business', [BusinessController::class, 'add'])->name('business.add');








