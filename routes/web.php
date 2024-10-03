<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;



    // Routes handled by FrontEndController
    Route::controller(FrontEndController::class)->group(function () {
        Route::get('/', 'homePage')->name('home-page');
        Route::get('/shop', 'shopPage')->name('shop');
        Route::get('/shopdetail', 'shopDetailPage')->name('shopdetail');
        Route::get('/cart', 'cartPage')->name('cart');
        Route::get('/checkout', 'checkoutPage')->name('checkout');
        Route::get('/contact', 'contactPage')->name('contact');
    });

    

    // Example static views
    Route::view('/example-page', 'example-page');
    Route::view('/example-auth', 'example-auth');
    Route::view('example-frontend', 'example-frontend');
    
