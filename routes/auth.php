<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::post('register', [Auth\RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('login', [Auth\AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('forgot-password', [Auth\PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('reset-password', [Auth\NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('verify-email/{id}/{hash}', Auth\VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post('logout', [Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::patch('update-account', Auth\UpdateAccountController::class)
    ->middleware('auth')
    ->name('update-account');

Route::patch('update-password', Auth\UpdatePasswordController::class)
    ->middleware('auth')
    ->name('update-password');
