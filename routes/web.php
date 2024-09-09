<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Admin route start from here
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
        Route::get('/category-add', [CategoryController::class, 'create'])->name('category-create');
        Route::get('/category-edit/{slug}', [CategoryController::class, 'edit'])->name('category-edit');

        Route::post('/category-store', [CategoryController::class, 'store'])->name('category-store');
        Route::put('/category-update/{slug}', [CategoryController::class, 'update'])->name('category-update');

        Route::get('/category-delete/{slug}', [CategoryController::class, 'delete'])->name('category-delete');

        # START : Product Route
        Route::get('/product', [ProductController::class, 'index'])->name('product-index');
        Route::get('/product-add', [ProductController::class, 'create'])->name('product-create');
        Route::get('/product-edit/{slug}', [ProductController::class, 'edit'])->name('product-edit');

        Route::post('/product-store', [ProductController::class, 'store'])->name('product-store');
        Route::put('/product-update/{slug}', [ProductController::class, 'update'])->name('product-update');

        Route::get('/product-delete/{slug}', [ProductController::class, 'delete'])->name('product-delete');
        Route::get('/product-details/{slug}', [ProductController::class, 'view'])->name('product-details');
        Route::post('/upload-product-image/{slug}', [ProductController::class, 'uploadImage'])->name('upload-product-image');
        # END : Product Route

        # START : Order Route
        Route::get('/orders', [OrderController::class, 'index'])->name('order-index');
        Route::get('/order-details/{slug}', [OrderController::class, 'view'])->name('order-details');

        # END : Order Route
    });
});
// Admin route end from here

@include 'front-site.php';
