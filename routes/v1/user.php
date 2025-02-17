<?php

use App\Http\Controllers\Api\UserController;

Route::get('/me', [UserController::class, 'me'])->name('auth.me');
