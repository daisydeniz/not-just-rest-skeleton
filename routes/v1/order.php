<?php

use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;

Route::apiResource('orders', OrderController::class)->only(['index', 'store', 'destroy']);
Route::get('/orders/{order}/discounts', [DiscountController::class, 'calculateOrderDiscount'])->where('order', '[0-9]+')
    ->name('orders.discounts');
