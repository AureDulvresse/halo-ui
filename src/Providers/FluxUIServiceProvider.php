<?php

namespace Flux\UI\Providers;

use Illuminate\Support\ServiceProvider;
use Flux\UI\Commands\InstallComponentCommand;

class FluxUIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../stubs/components' => resource_path('views/components/flux'),
        ], 'flux-ui-components');

        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/flux-ui'),
        ], 'flux-ui-assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallComponentCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        //
    }
}
