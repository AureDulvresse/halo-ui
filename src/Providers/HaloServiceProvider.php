<?php

namespace Halo\UI\Providers;

use BladeUI\Icons\Factory;
use Halo\UI\Console\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class HaloServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/halo.php', 'halo');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerPublishing();
        $this->registerBladeComponents();
        $this->registerBladeIcons();
        $this->registerViews();
    }

    /**
     * Register artisan commands.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    /**
     * Register publishable resources.
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../../config/halo.php' => config_path('halo.php'),
            ], 'halo-config');

            // Publish views
            $this->publishes([
                __DIR__.'/../../resources/views' => resource_path('views/vendor/halo'),
            ], 'halo-views');

            // Publish stubs for component installation
            $this->publishes([
                __DIR__.'/../../stubs/components' => resource_path('views/components/halo'),
            ], 'halo-components');

            // Publish icons
            $this->publishes([
                __DIR__.'/../../resources/icons' => resource_path('icons'),
            ], 'halo-icons');

            // Publish assets (JS + CSS)
            $this->publishes([
                __DIR__.'/../../public' => public_path('vendor/halo-ui'),
            ], 'halo-assets');

            // Publish everything
            $this->publishes([
                __DIR__.'/../../config/halo.php' => config_path('halo.php'),
                __DIR__.'/../../resources/views' => resource_path('views/vendor/halo'),
                __DIR__.'/../../resources/icons' => resource_path('icons'),
                __DIR__.'/../../public' => public_path('vendor/halo-ui'),
            ], 'halo');
        }
    }

    /**
     * Register Blade components.
     */
    protected function registerBladeComponents(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'halo');

        // Register anonymous components automatically
        Blade::anonymousComponentPath(__DIR__.'/../../resources/views/components/halo', 'halo');
    }

    /**
     * Register Blade Icons set.
     */
    protected function registerBladeIcons(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('halo', [
                'path' => __DIR__.'/../../resources/icons/halo',
                'prefix' => 'halo',
            ]);
        });
    }

    /**
     * Register view namespace.
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'halo');
    }
}
