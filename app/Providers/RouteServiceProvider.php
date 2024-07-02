<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider{

    public const DASHBOARD = '/dashboard';
    public const LOGIN = '/login';
    public const HOME = '/home';

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void{
        Route::pattern('Id','[0-9]+');

//        $this->configureRateLimiting();
    }
}
