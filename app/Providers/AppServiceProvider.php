<?php

namespace Noblex\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Noblex\Repositories\EloquentBrand;
use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\Interfaces\BrandInterface;
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

        $this->app->bind(
            BrandInterface::class, 
            EloquentBrand::class
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
