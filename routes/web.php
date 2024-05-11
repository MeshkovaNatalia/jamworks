<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthUserMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(AuthUserMiddleware::class)->group(function () {
    Route::get('/user/orders', [UserController::class, 'getUserOrders']);
    Route::get('/products', [ProductController::class, 'getAllProducts']);
    Route::get('/product/{productId}', [ProductController::class, 'getProductDetails']);
    Route::get('/order/{orderId}', [OrderController::class, 'getOrderDetails']);
    Route::post('/order', [OrderController::class, 'createOrder']);
});
