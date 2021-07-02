<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth('doctor')->user() && auth('doctor')->user() ->is_admin == 1;
        });
        Blade::if('doctor', function () {
            return auth('doctor')->user() && auth('doctor')->user() ->is_admin == 0;
        });
    }
}
