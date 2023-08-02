<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Artisan;
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
        ini_set('memory_limit', '4400M');

//        Artisan::call('migrate');
        if(!session()->get('lang')){
            session()->put('lang','en');
        }
    }
}
