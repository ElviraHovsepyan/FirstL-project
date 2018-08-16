<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade; 
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::directive('myDir',function($var){
            return "<h1>New Directive - $var</h1>";

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
