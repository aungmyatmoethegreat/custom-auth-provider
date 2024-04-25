<?php

namespace App\Providers;

use Breeze\Breeze\Connectors\AuthConnector;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::provider('sso', fn(Application $app, array $config) => new AuthServiceProvider($app, $config['model']));

        $this->app->singleton(AuthConnector::class, fn(Application $app) => new AuthConnector(
            token: request()->bearerToken() ?? '',
        ));
    }
}
