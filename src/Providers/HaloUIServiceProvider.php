<?php

namespace Halo\UI\Providers;

use Illuminate\Support\ServiceProvider;
use Halo\UI\Commands\InstallComponentCommand;
use Illuminate\Support\Facades\Blade;

class HaloUIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load views from stubs as fallback
        $this->loadViewsFrom(__DIR__ . '/../../stubs/components', 'halo');

        // Publish components stubs
        $this->publishes([
            __DIR__ . '/../../stubs/components' => resource_path('views/components/halo'),
        ], 'halo-ui-components');

        // Publish public assets
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/halo-ui'),
        ], 'halo-ui-assets');

        // Register Blade components alias
        Blade::componentNamespace('Halo\\UI\\Components', 'halo');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallComponentCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/haloui.php', 'haloui');
    }
}
