<?php

namespace Prism\UI\Providers;

use Illuminate\Support\ServiceProvider;
use Prism\UI\Commands\InstallComponentCommand;
use Illuminate\Support\Facades\Blade;

class PrismUIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load views from stubs as fallback
        $this->loadViewsFrom(__DIR__ . '/../../stubs/components', 'prism');

        // Publish components stubs
        $this->publishes([
            __DIR__ . '/../../stubs/components' => resource_path('views/components/prism'),
        ], 'prism-ui-components');

        // Publish public assets
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/prism-ui'),
        ], 'prism-ui-assets');

        // Register Blade components alias
        Blade::componentNamespace('Prism\\UI\\Components', 'prism');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallComponentCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/prismui.php', 'prismui');
    }
}
