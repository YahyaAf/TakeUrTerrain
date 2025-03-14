<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\RegisterRepository;
use App\Services\Auth\RegisterService;
use App\Repositories\Auth\LoginRepository;
use App\Services\Auth\LoginService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegisterRepository::class, function () {
            return new RegisterRepository();
        });

        $this->app->bind(RegisterService::class, function ($app) {
            return new RegisterService($app->make(RegisterRepository::class));
        });

        $this->app->bind(LoginRepository::class, function () {
            return new LoginRepository();
        });

        $this->app->bind(LoginService::class, function ($app) {
            return new LoginService($app->make(LoginRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
