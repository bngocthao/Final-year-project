<?php

namespace App\Providers;

use App\Services\RoleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the RoleService class with the service container.
        $this->app->bind('RoleService', function () {
            return new RoleService();
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
