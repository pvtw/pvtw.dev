<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginWithGitHubController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about-me', AboutController::class)->name('about');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['guest'])->group(function (): void {
    Route::get('/auth/login', [LoginController::class, 'create'])->name('auth.login.create');
    Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.login.store');
    // Route::get('/auth/register', [RegisterController::class, 'create'])->name('auth.register.create');
    // Route::post('/auth/register', [RegisterController::class, 'store'])->name('auth.register.store');
    // Route::get('/auth/github/redirect', [LoginWithGitHubController::class, 'create'])->name('auth.github.create');
    // Route::get('/auth/github/callback', [LoginWithGitHubController::class, 'store'])->name('auth.github.store');
});

Route::middleware(['auth'])->group(function (): void {
    Route::post('/auth/logout', LogoutController::class)->name('auth.logout');

    // Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'index'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    // Route::get('/email/verify', [EmailVerificationController::class, 'create'])->name('verification.notice');
    // Route::post('/email/verify', [EmailVerificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');
});
