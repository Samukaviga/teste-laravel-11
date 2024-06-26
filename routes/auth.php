<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    
    
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::get('/series', [SeriesController::class, 'index'])->name('inicial');
    Route::get('/series/criar', [SeriesController::class, 'create'])->name('criar');
    Route::post('/series', [SeriesController::class, 'store']);
    Route::get('/series/{id}/editar', [SeriesController::class, 'edit']);
    Route::put('/series/{id}', [SeriesController::class, 'update']);
    Route::delete('/series/{id}', [SeriesController::class, 'destroy']);

    Route::get('/temporadas/{id}', [TemporadasController::class, 'index']);

    Route::get('/episodios/{id}', [EpisodiosController::class, 'index']);
    Route::put('/episodios/{id}', [EpisodiosController::class, 'update']);

    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
