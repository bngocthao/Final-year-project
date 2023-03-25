<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FunctionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        foreach (glob(app_path(). '/Helpers/*.php') as $file){
            require_once($file);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
