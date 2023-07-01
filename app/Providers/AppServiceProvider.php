<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\AboutRepository','App\Repositories\AboutRepositoryEloquent');
        $this->app->bind('App\Repositories\ProfileRepository','App\Repositories\ProfileRepositoryEloquent');
        $this->app->bind('App\Repositories\CallMeRepository','App\Repositories\CallMeRepositoryEloquent');
        $this->app->bind('App\Repositories\ContactRepository','App\Repositories\ContactRepositoryEloquent');
        $this->app->bind('App\Repositories\MediaRepository','App\Repositories\MediaRepositoryEloquent');
        $this->app->bind('App\Repositories\JusticeintroRepository','App\Repositories\JusticeintroRepositoryEloquent');
        $this->app->bind('App\Repositories\GalleryRepository','App\Repositories\GalleryRepositoryEloquent');
        $this->app->bind('App\Repositories\TestimonialRepository','App\Repositories\TestimonialRepositoryEloquent');
        $this->app->bind('App\Repositories\BannerRepository','App\Repositories\BannerRepositoryEloquent');
        $this->app->bind('App\Repositories\FAQRepository','App\Repositories\FAQRepositoryEloquent');
        $this->app->bind('App\Repositories\NotifyModelRepository','App\Repositories\NotifyModelRepositoryEloquent');
        $this->app->bind('App\Repositories\MissionRepository','App\Repositories\MissionRepositoryEloquent');
        $this->app->bind('App\Repositories\ItemsRepository','App\Repositories\ItemsRepositoryEloquent');
        $this->app->bind('App\Repositories\CategoriesRepository','App\Repositories\CategoriesRepositoryEloquent');
        $this->app->bind('App\Repositories\SubCategoriesRepository','App\Repositories\SubCategoriesRepositoryEloquent');
        $this->app->bind('App\Repositories\SettingsRepository','App\Repositories\SettingsRepositoryEloquent');
        $this->app->bind('App\Repositories\OpeningHourRepository','App\Repositories\OpeningHourRepositoryEloquent');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
