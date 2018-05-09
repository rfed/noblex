<?php

namespace Noblex\Providers;

use Illuminate\Support\ServiceProvider;
use Noblex\Category;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('errors::404', function($view)
        {
            $view->with([
                'randomCategories' => Category::where('root_id', '!=', 0)
                                            ->inRandomOrder()
                                            ->limit(3)
                                            ->get()
            ]);
        });

        view()->composer('errors::403', function($view)
        {
            $view->with([
                'randomCategories' => Category::where('root_id', '!=', 0)
                                            ->inRandomOrder()
                                            ->limit(3)
                                            ->get()
            ]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
