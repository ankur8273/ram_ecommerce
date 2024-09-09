<?php

use App\Http\Controllers\FrontSite\HomeController;
use App\Http\Controllers\FrontSite\ShoppingController;
use App\Http\Controllers\FrontSite\VisitorsController;
use App\Http\Controllers\FrontSite\VisitorsHomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('front-')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('/products/{categorySlug?}', [HomeController::class, 'products'])->name('products');
    Route::post('/add-to-cart', [ShoppingController::class, 'addToCart'])->name('add-to-cart');


    Route::middleware(['guest:visitor'])->group(function () {
        Route::get('/login', [VisitorsController::class, 'login'])->name('login');
        Route::post('/login-post', [VisitorsController::class, 'loginPost'])->name('login-post');
        Route::get('/register', [VisitorsController::class, 'register'])->name('register');
        Route::post('/register-post', [VisitorsController::class, 'registerPost'])->name('register-post');
        Route::get('/forgot-password', [VisitorsController::class, 'forgotPassword'])->name('forgot-password');
        Route::post('/forgot-post', [VisitorsController::class, 'forgotPasswordPost'])->name('forgot-password-post');
    });


    Route::middleware(['auth:visitor'])->group(function () {
        Route::post('/logout', [VisitorsController::class, 'logout'])->name('logout');
        // Route::post('/change-password-post', [VisitorsController::class, 'changePassword'])->name('change-password-post');

        Route::get('/profile', [VisitorsHomeController::class, 'profile'])->name('visitor-profile');
        Route::post('/update-profile', [VisitorsHomeController::class, 'updateProfile'])->name('update-profile');
 
        // Route::get('/dashboard', [VisitorsHomeController::class, 'home'])->name('visitor-home');



        Route::get('/cart', [ShoppingController::class, 'cartItems'])->name('cart');
        Route::post('/update-cart', [ShoppingController::class, 'updateCart'])->name('update-cart');
        Route::get('/remove-from-cart/{slug}', [ShoppingController::class, 'removeCartItems'])->name('remove-from-cart');
        Route::get('/checkout', [ShoppingController::class, 'checkout'])->name('checkout');
        Route::post('/place-order', [ShoppingController::class, 'placeOrder'])->name('place-order');
        Route::get('/dashboard', [ShoppingController::class, 'getOrderList'])->name('visitor-home');


    });

});
