<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::loginUsingId(1);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', Controllers\Auth\AuthenticatedUserController::class);

    Route::get('internal/users', [Controllers\Internal\UserController::class, 'index']);
});
