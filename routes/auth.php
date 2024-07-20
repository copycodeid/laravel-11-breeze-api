<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

// Guest Route
Route::middleware(['guest'])->group(function () {
    Route::post('register', [Auth\RegisteredUserController::class, 'store'])
        ->name('register');

    Route::post('login', [Auth\AuthenticatedSessionController::class, 'store'])
        ->name('login');

    Route::post('forgot-password', [Auth\PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::post('reset-password', [Auth\NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Auth Route
Route::middleware(['auth'])->group(function () {
    Route::get('verify-email/{id}/{hash}', Auth\VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');

    Route::post('logout', [Auth\AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::patch('update-account', Auth\UpdateAccountController::class)
        ->name('update-account');

    Route::patch('update-password', Auth\UpdatePasswordController::class)
        ->name('update-password');
});
