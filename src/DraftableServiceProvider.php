<?php

namespace LittleGreenMan\Draftable;

use Illuminate\Support\ServiceProvider;

class DraftableServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'littlegreenman');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'littlegreenman');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/draftable.php', 'draftable');

        // Register the service the package provides.
        $this->app->singleton('draftable', function ($app) {
            return new Draftable;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['draftable'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/draftable.php' => config_path('draftable.php'),
        ], 'draftable.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/littlegreenman'),
        ], 'draftable.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/littlegreenman'),
        ], 'draftable.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/littlegreenman'),
        ], 'draftable.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
