<?php

namespace Halo\UI\Providers;

use BladeUI\Icons\Components\Svg as SvgComponent;
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
            $this->publishes([
                __DIR__.'/../../config/halo.php' => config_path('halo.php'),
            ], 'halo-config');

            $this->publishes([
                __DIR__.'/../../resources/icons' => resource_path('icons'),
            ], 'halo-icons');

            $this->publishes([
                __DIR__.'/../../public/js' => public_path('vendor/halo-ui/js'),
                __DIR__.'/../../public/css' => public_path('vendor/halo-ui/css'),
            ], 'halo-assets');

            $this->publishes([
                __DIR__.'/../../config/halo.php' => config_path('halo.php'),
                __DIR__.'/../../resources/icons' => resource_path('icons'),
                __DIR__.'/../../public/js' => public_path('vendor/halo-ui/js'),
                __DIR__.'/../../public/css' => public_path('vendor/halo-ui/css'),
            ], 'halo');
        }
    }

    /**
     * Register Blade components. Components work out of the box via this
     * anonymous component path — running `halo:install` is only needed to
     * eject an editable copy into the consuming app.
     */
    protected function registerBladeComponents(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'halo');

        Blade::anonymousComponentPath(__DIR__.'/../../resources/views/components/halo', 'halo');
    }

    /**
     * Register the Blade Icons set and its <x-halo-{icon}/> components.
     *
     * Components are registered directly here (rather than relying on
     * BladeUI\Icons\Factory::registerComponents()) because that method reads
     * through a shared, memoized manifest that can be primed with an empty
     * result before this package gets a chance to add its icon set —
     * whichever package's view factory resolves first wins the cache.
     * Scanning our own icons directory sidesteps that shared cache entirely.
     */
    protected function registerBladeIcons(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $path = __DIR__.'/../../resources/icons/halo';

            $factory->add('halo', [
                'path' => $path,
                'prefix' => 'halo',
            ]);

            foreach (glob($path.'/*.svg') as $svg) {
                Blade::component(SvgComponent::class, basename($svg, '.svg'), 'halo');
            }
        });
    }
}
