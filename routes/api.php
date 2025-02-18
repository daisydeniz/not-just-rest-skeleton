<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::scopeBindings()->prefix('v1')->middleware('auth:sanctum')->group(function () {
    require __DIR__ . '/v1/user.php';
    require __DIR__ . '/v1/order.php';
    require __DIR__ . '/v1/product.php';
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
