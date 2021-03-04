<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Passport::routes();

        try {
            $categoriesGlobal = Category::all();
            $menusGlobal = Menu::all();
        } catch (\Exception $exception) {

        }
        \View::share('categoriesGlobal', $categoriesGlobal ?? []);
        \View::share('menusGlobal', $menusGlobal ?? []);
    }
}
