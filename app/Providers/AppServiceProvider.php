<?php

namespace Noblex\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Noblex\Repositories\EloquentUser;
use Noblex\Repositories\EloquentBrand;
use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\EloquentWidget;
use Noblex\Repositories\EloquentWidgetMedia;
use Noblex\Repositories\EloquentFeature;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\EloquentGroup;
use Noblex\Repositories\EloquentAttribute;
use Noblex\Repositories\EloquentTag;
use Noblex\Repositories\EloquentTheme;
use Noblex\Repositories\EloquentStory;
use Noblex\Repositories\Interfaces\UserInterface;
use Noblex\Repositories\Interfaces\BrandInterface;
use Noblex\Repositories\Interfaces\CategoryInterface;
use Noblex\Repositories\Interfaces\FeatureInterface;
use Noblex\Repositories\Interfaces\ProductInterface;
use Noblex\Repositories\Interfaces\WidgetInterface;
use Noblex\Repositories\Interfaces\WidgetMediaInterface;
use Noblex\Repositories\Interfaces\GroupInterface;
use Noblex\Repositories\Interfaces\AttributeInterface;
use Noblex\Repositories\Interfaces\TagInterface;
use Noblex\Repositories\Interfaces\ThemeInterface;
use Noblex\Repositories\Interfaces\StoryInterface;

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
            UserInterface::class, 
            EloquentUser::class
        );

        $this->app->bind(
            CategoryInterface::class, 
            EloquentCategory::class
        );

        $this->app->bind(
            ProductInterface::class,
            EloquentProduct::class
        );

        $this->app->bind(
            WidgetInterface::class,
            EloquentWidget::class
        );

        $this->app->bind(
            WidgetMediaInterface::class,
            EloquentWidgetMedia::class
        );

        $this->app->bind(
            BrandInterface::class,
            EloquentBrand::class
        );

        $this->app->bind(
            FeatureInterface::class,
            EloquentFeature::class
        );

        $this->app->bind(
            GroupInterface::class,
            EloquentGroup::class
        );

        $this->app->bind(
            AttributeInterface::class,
            EloquentAttribute::class
        );

        $this->app->bind(
            TagInterface::class,
            EloquentTag::class
        );

        $this->app->bind(
            ThemeInterface::class,
            EloquentTheme::class
        );

        $this->app->bind(
            StoryInterface::class,
            EloquentStory::class
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
