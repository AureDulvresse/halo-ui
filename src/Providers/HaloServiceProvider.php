<?php

namespace Halo\UI\Providers;

use Halo\UI\Commands\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use BladeUI\Icons\Factory as IconFactory;

class HaloServiceProvider extends ServiceProvider
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
        $this->registerDirectives();
        $this->registerBladeIcons();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Merge package config located in package config/ folder
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/halo.php',
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

        // Register component aliases for convenience (short names like <x-halo-btn />)
        $this->registerComponentAliases();
    }

    /**
     * Register component aliases.
     */
    protected function registerComponentAliases(): void
    {
        $aliases = [
            'btn' => 'button',
            'txt' => 'input',
            'sel' => 'select',
        ];

        foreach ($aliases as $alias => $component) {
            // Register a simple alias such as <x-halo-btn /> that points to the class-based component
            // Second argument must be a valid component tag name (no double-colon here).
            Blade::component("Halo\\UI\\Components\\" . ucfirst($component), "halo-{$alias}");
        }
    }

    /**
     * Register publishable resources.
     */
    protected function registerPublishables(): void
    {
        if ($this->app->runningInConsole()) {
            // Config
            $this->publishes([
                __DIR__ . '/../../config/halo.php' => config_path('halo.php'),
            ], 'halo-config');

            // Stubs
            $this->publishes([
                __DIR__ . '/../../stubs/components' => resource_path('views/components/halo'),
            ], 'halo-components');

            // JavaScript & CSS
            $this->publishes([
                __DIR__ . '/../../resources/js' => public_path('vendor/halo-ui/js'),
                __DIR__ . '/../../resources/css' => public_path('vendor/halo-ui/css'),
            ], 'halo-assets');

            // Templates
            $this->publishes([
                __DIR__ . '/../../templates' => resource_path('views/halo-templates'),
            ], 'halo-templates');

            // Icons
            $this->publishes([
                __DIR__ . '/../../resources/icons' => public_path('vendor/halo-ui/icons'),
            ], 'halo-icons');
        }
    }

    /**
     * Register views.
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../stubs/components', 'halo');
    }

    /**
     * Register custom Blade directives.
     */
    protected function registerDirectives(): void
    {
        // @haloIcon directive for easy icon usage
        Blade::directive('haloIcon', function ($expression) {
            // Render the anonymous/icon view with the provided name expression.
            // Use View::make so we can render a view from the package namespace.
            return "<?php echo \View::make('halo::icon', ['name' => {$expression}])->render(); ?>";
        });

        // @haloTheme directive to get theme colors
        Blade::directive('haloTheme', function ($expression) {
            // Return a color array or fallback to the raw expression. Use data_get for safety.
            return "<?php echo data_get(config('halo.design.colors'), {$expression}, {$expression}); ?>";
        });
    }

    /**
     * Register Blade Icons set with Blade UI Icons factory.
     */
    protected function registerBladeIcons(): void
    {
        // Register icons when the icon factory is available. This allows packages like
        // Blade UI Kit to collect SVG files placed in resources/icons.
            $this->app->afterResolving(IconFactory::class, function (IconFactory $factory) {
                $iconsPath = __DIR__ . '/../../resources/icons';
                // Factory expects array of paths
                $factory->add('halo', [$iconsPath]);
            });
    }
}
