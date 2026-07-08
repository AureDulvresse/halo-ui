<?php

namespace Halo\UI\Providers;

use BladeUI\Icons\Components\Svg as SvgComponent;
use BladeUI\Icons\Factory;
use Halo\UI\Console\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
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
        $this->registerAssetRoutes();
        $this->registerBladeDirectives();
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

    /**
     * Serve the package's own built CSS/JS directly, so a consuming app gets
     * working styles and interactivity (Alpine.js is bundled into the JS
     * build) immediately after `composer require` — no `vendor:publish`, no
     * Vite config, no separate Alpine.js install. Disable via
     * `config('halo.assets.serve', false)` to publish and bundle these
     * yourself instead (see the `halo-assets` publish tag).
     */
    protected function registerAssetRoutes(): void
    {
        if (! config('halo.assets.serve', true)) {
            return;
        }

        Route::get('/halo-ui/halo.css', function () {
            return response()
                ->file(__DIR__.'/../../public/css/halo.css', ['Content-Type' => 'text/css']);
        })->name('halo-ui.css');

        Route::get('/halo-ui/init.js', function () {
            return response()
                ->file(__DIR__.'/../../public/js/init.js', ['Content-Type' => 'application/javascript']);
        })->name('halo-ui.js');
    }

    /**
     * `@haloStyles` / `@haloScripts` — drop-in tags for a layout, the same
     * shape as Livewire's `@livewireStyles`/`@livewireScripts`. Point at the
     * asset routes above by default, or at the published `vendor:publish`
     * path when `halo.assets.serve` is disabled.
     */
    protected function registerBladeDirectives(): void
    {
        // Delegates to a static method rather than inlining the config()
        // lookup in the compiled PHP: Blade caches compiled views by their
        // source path, so a call resolved once at compile time would freeze
        // whichever config value was active then. Calling out to a method
        // guarantees the config is re-read on every render.
        Blade::directive('haloStyles', fn () => '<?php echo \'<link rel="stylesheet" href="\'.e('.self::class.'::styleUrl()).\'">\'; ?>');
        Blade::directive('haloScripts', fn () => '<?php echo \'<script src="\'.e('.self::class.'::scriptUrl()).\'" defer></script>\'; ?>');
    }

    /**
     * The URL @haloStyles resolves to — the package's own asset route by
     * default, or the `vendor:publish`ed path when asset serving is off.
     */
    public static function styleUrl(): string
    {
        return config('halo.assets.serve', true)
            ? route('halo-ui.css')
            : asset('vendor/halo-ui/css/halo.css');
    }

    /**
     * The URL @haloScripts resolves to — see styleUrl().
     */
    public static function scriptUrl(): string
    {
        return config('halo.assets.serve', true)
            ? route('halo-ui.js')
            : asset('vendor/halo-ui/js/init.js');
    }
}
