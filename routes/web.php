<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginWithGitHubController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about-me', AboutController::class)->name('about');

Route::middleware(['guest'])->group(function (): void {
    Route::get('/auth/login', [LoginController::class, 'create'])->name('auth.login.create');
    Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.login.store');
    //Route::get('/auth/github/redirect', [LoginWithGitHubController::class, 'create'])->name('auth.github.create');
    //Route::get('/auth/github/callback', [LoginWithGitHubController::class, 'store'])->name('auth.github.store');
});

Route::middleware(['auth'])->group(function (): void {
    Route::post('/auth/logout', LogoutController::class)->name('auth.logout');
});
