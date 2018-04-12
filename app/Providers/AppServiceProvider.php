<?php

namespace Noblex\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Noblex\Repositories\CacheCategory;
use Noblex\Repositories\Interfaces\CategoryInterface;

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
