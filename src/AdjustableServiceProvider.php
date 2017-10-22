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

		// Allow application to publish and modify package assets grouped by asset type tag
        // $ php artisan vendor:publish --tag=migrations --force [--tag=option]
        $this->publishes([
            __DIR__ . '/../database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
	}
}
