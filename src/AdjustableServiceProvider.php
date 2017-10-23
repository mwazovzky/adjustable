<?php

namespace Mikewazovzky\Adjustable;

use Illuminate\Support\ServiceProvider;

class AdjustableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        //  load and make available to the application package migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        //  load and make available to the application package routes
        // $this->loadRoutesFrom(__DIR__ . '/../src/Http/routes.php');

        // Allow application to publish and modify package assets grouped by asset type tag

        // $ php artisan vendor:publish --tag=config --force
        // $this->publishes([
        //     __DIR__ . '/../config/adjustable.php' => config_path('adjustable.php'),
        // ], 'config');

        // $ php artisan vendor:publish --tag=migrations --force
        $this->publishes([
            __DIR__ . '/../database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
    }

    public function register()
    {
        // Merge package configuration file with the application's published copy.
        // This allows users to define only the options they actually want
        // to override in the published copy of the configuration.
        // $this->mergeConfigFrom(__DIR__ . '/../config/adjustable.php', 'adjustable');
    }
}
