<?php

declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $isProduction = App::isProduction();

        Model::preventLazyLoading( ! $isProduction);
        Model::preventSilentlyDiscardingAttributes( ! $isProduction);
        Model::preventAccessingMissingAttributes( ! $isProduction);

        Date::use(CarbonImmutable::class);

        Blade::if('admin', fn (): bool => Auth::user()->is_admin ?? false);

        Password::defaults(fn (): Password => Password::min(8)->max(100)->mixedCase()->numbers()->symbols());
    }
}
