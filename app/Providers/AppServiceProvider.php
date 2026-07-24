<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        if (env('APP_ENV') === 'production' || isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        \Illuminate\Pagination\Paginator::useBootstrapFive();
    }
}