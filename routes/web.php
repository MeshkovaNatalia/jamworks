<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{userId}/orders', [UserController::class, 'getUserOrders']);
Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/product/{productId}', [ProductController::class, 'getProductDetails']);
Route::get('/order/{userId}/{orderId}', [OrderController::class, 'getOrderDetails']);
Route::get('/order/{userId}', [OrderController::class, 'createOrder']);
