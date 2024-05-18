<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

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
    }
}
