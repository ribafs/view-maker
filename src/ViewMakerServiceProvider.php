<?php

namespace Ribafs\ViewMaker;

use Illuminate\Support\ServiceProvider;

class ViewMakerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ribafs');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ribafs');
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
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/view-maker.php', 'view-maker');

        // Register the service the package provides.
        $this->app->singleton('view-maker', function ($app) {
            return new ViewMaker;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['view-maker'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/view-maker.php' => config_path('view-maker.php'),
        ], 'view-maker.config');

        // Publishing the command.
        $this->publishes([
            __DIR__.'/Commands/ViewsMakeCommand.php' => app_path('Console/Commands/ViewsMakeCommand.php'),
        ], 'view-maker.command');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ribafs'),
        ], 'view-maker.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ribafs'),
        ], 'view-maker.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
