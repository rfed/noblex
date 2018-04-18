<?php

namespace Noblex\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Noblex\Repositories\CacheCategory;
use Noblex\Repositories\CacheProduct;
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
            CacheCategory::class
        );

        $this->app->bind(
            ProductInterface::class,
            CacheProduct::class
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
