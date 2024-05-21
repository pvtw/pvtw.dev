<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginWithGitHubController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about-me', AboutController::class)->name('about');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::middleware(['guest'])->group(function (): void {
    Route::get('/auth/login', [LoginController::class, 'create'])->name('auth.login.create');
    Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.login.store');
    //Route::get('/auth/github/redirect', [LoginWithGitHubController::class, 'create'])->name('auth.github.create');
    //Route::get('/auth/github/callback', [LoginWithGitHubController::class, 'store'])->name('auth.github.store');
});

Route::middleware(['auth'])->group(function (): void {
    Route::post('/auth/logout', LogoutController::class)->name('auth.logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function (): void {
    Route::view('/', 'pages.admin.index')->name('index');
    Route::controller(AdminProjectController::class)->name('projects.')->group(function (): void {
        Route::get('/projects', 'index')->name('index');
        Route::get('/projects/create', 'create')->name('create');
        Route::post('/projects', 'store')->name('store');
        Route::get('/project/{project}/edit', 'edit')->name('edit');
        Route::match(['put', 'patch'], '/project/{project}', 'update')->name('update');
        Route::delete('/project/{project}', 'destroy')->name('destroy');
    });
});
