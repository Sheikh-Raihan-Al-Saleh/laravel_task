<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Login\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ProductController::class)->group(function () {
    Route::get('/product','ProductView')->name('product.view');
    Route::get('/product/edit/{id}','productEdit')->name('product.edit');
    Route::post('/products/store','productStore')->name('product.store');
    Route::post('/products/update','productUpdate')->name('product.update');
    Route::get('/product/delete/{id}','productDelete')->name('product.delete');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'LoginPage')->name('login');
    Route::get('/logout', 'Logout')->name('logout');
    Route::post('/login', 'Login')->name('login.post');
});


