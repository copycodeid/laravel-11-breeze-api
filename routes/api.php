<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', Controllers\Auth\AuthenticatedUserController::class);

    Route::get('internal/users', [Controllers\Internal\UserController::class, 'index']);
});
