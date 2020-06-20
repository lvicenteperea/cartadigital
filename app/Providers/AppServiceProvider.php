<?php

namespace App\Providers;

// use App\Modelos\HXXI\Hxxi_Menu;
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
        // lo he puesto yo y lo comento yo
        // view()->composer('welcome', function($view) {
        // $view->with('menus', Hxxi_Menu::menus());
        // });

    }
}
