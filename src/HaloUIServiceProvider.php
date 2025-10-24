<?php

namespace Halo\UI;

use Halo\UI\Commands\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class HaloUIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerComponents();
        $this->registerPublishables();
        $this->registerViews();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/halo.php',
            'halo'
        );
    }

    /**
     * Register Artisan commands.
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
     * Register Blade components.
     */
    protected function registerComponents(): void
    {
        Blade::componentNamespace('Halo\\UI\\Components', 'halo');
    }

    /**
     * Register publishable resources.
     */
    protected function registerPublishables(): void
    {
        if ($this->app->runningInConsole()) {
            // Config
            $this->publishes([
                __DIR__ . '/../config/halo.php' => config_path('halo.php'),
            ], 'halo-config');

            // Stubs
            $this->publishes([
                __DIR__ . '/../stubs/components' => resource_path('views/components/halo'),
            ], 'halo-components');

            // JavaScript
            $this->publishes([
                __DIR__ . '/../resources/js' => public_path('vendor/halo-ui'),
            ], 'halo-assets');
        }
    }

    /**
     * Register views.
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../stubs/components', 'halo');
    }
}
