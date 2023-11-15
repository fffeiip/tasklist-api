<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\ServicesMonitoring;

class AppServiceProvider extends ServiceProvider
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
        $monitoringMiddleware = new ServicesMonitoring();
        Http::globalRequestMiddleware(fn($request)=> $monitoringMiddleware->handle($request));
    }
}
