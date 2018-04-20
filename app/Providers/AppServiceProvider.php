<?php

namespace Noblex\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\Interfaces\CategoryInterface;
use Noblex\Repositories\Interfaces\ProductInterface;

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

        $this->app->bind(
            CategoryInterface::class, 
            EloquentCategory::class
        );

        $this->app->bind(
            ProductInterface::class,
            EloquentProduct::class
        );
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
