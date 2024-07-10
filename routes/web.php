<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginWithGitHubController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('about-me', AboutController::class)->name('about');
Route::view('privacy-policy', 'pages.privacy-policy')->name('privacy-policy');

Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['guest'])->group(function (): void {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('auth/github/redirect', [LoginWithGitHubController::class, 'create'])->name('auth.github.redirect');
    Route::get('auth/github/callback', [LoginWithGitHubController::class, 'store'])->name('auth.github.callback');

    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::middleware(['auth'])->group(function (): void {
    Route::post('logout', LogoutController::class)->name('logout');

    Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'index'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::get('email/verify', [EmailVerificationController::class, 'create'])->name('verification.notice');
    Route::post('email/verify', [EmailVerificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');

    Route::get('confirm-password', [ConfirmPasswordController::class, 'create'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmPasswordController::class, 'store'])->middleware(['throttle:6,1']);
});
