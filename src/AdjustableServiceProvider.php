<?php
namespace Mikewazovzky\Adjustable;

use Illuminate\Support\ServiceProvider;

class AdjustableServiceProvider extends ServiceProvider
{
    
	public function boot()
	{
		// load and make available to the application package routes
        // $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
		
        //  load and make available to the application package views
        // $this->loadViewsFrom(__DIR__ . '/../views', 'mikewazovzky-favoritable');
		
        //  load and make available to the application package migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
		        
		// Allow application to publish and modify package assets grouped by asset type tag
        // php artisan vendor:publish --tag=sometag --force
        // --tag=config
        $this->publishes([
            __DIR__ . '/../config/main.php' => config_path('mikewazovzky-favoritable.php'),
        ], 'config');
		
        // --tag=view
        // $this->publishes([
        //     __DIR__ . '/../views' => base_path('resources/views/vendor/mikewazovzky-favoritable')
        // ], 'view');  
		
        // --tag=migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');      
	}
	
	public function register()
    {		
		// load and make available to the application package configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/main.php', 'mikewazovzky-favorites'
        );        
    }	
}