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
                'latestCategories' => Category::where('root_id', '!=', 0)
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
