<?php

namespace App\Providers;

use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use Illuminate\Support\ServiceProvider;
use App\Services\Terrain\TerrainService;
use App\Repositories\Auth\LoginRepository;
use App\Services\Auth\ResetPasswordService;
use App\Services\Auth\ForgetPasswordService;
use App\Repositories\Auth\RegisterRepository;
use App\Repositories\Terrain\TerrainRepository;
use App\Repositories\Auth\ResetPasswordRepository;
use App\Repositories\Auth\ForgetPasswordRepository;

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

        $this->app->bind(ForgetPasswordRepository::class, function () {
            return new ForgetPasswordRepository();
        });
        
        $this->app->bind(ForgetPasswordService::class, function ($app) {
            return new ForgetPasswordService($app->make(ForgetPasswordRepository::class));
        });

        $this->app->bind(ResetPasswordRepository::class, function () {
            return new ResetPasswordRepository();
        });
        
        $this->app->bind(ResetPasswordService::class, function ($app) {
            return new ResetPasswordService($app->make(ResetPasswordRepository::class));
        });

        $this->app->bind(TerrainRepository::class, function ($app) {
            return new TerrainRepository();
        });
    
        $this->app->bind(TerrainService::class, function ($app) {
            return new TerrainService($app->make(TerrainRepository::class));
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
