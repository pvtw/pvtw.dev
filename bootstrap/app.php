<?php

declare(strict_types=1);

use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => EnsureUserIsAdmin::class,
        ]);

        // If the user is not authenticated when visiting a protected location
        // Redirect to the 'auth.login.create' route (The default is 'login')
        $middleware->redirectGuestsTo(fn (Request $request) => route('auth.login.create'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {

    })->create();
