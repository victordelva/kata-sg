<?php

namespace App\Providers;

use App\Persistance\Repositories\Lawsuits\DatabaseTrailRepository;
use App\Persistance\Repositories\Lawsuits\TrailRepositoryInterface;
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
        $this->app->bind(
            TrailRepositoryInterface::class,
            DatabaseTrailRepository::class
        );
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
