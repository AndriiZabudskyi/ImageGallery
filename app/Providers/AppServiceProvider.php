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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Services\Interfaces\ImageGalleryInterface::class,
            \App\Services\ImageGalleryService::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\TagRepositoryInterface::class,
            \App\Repositories\TagRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\ImageRepositoryInterface::class,
            \App\Repositories\ImageRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\StorageRepositoryInterface::class,
            \App\Repositories\StorageRepository::class
        );
    }
}
