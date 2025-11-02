<?php

namespace Tests;

use Halo\UI\Providers\HaloServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Configuration des chemins de vue pour les tests
        $this->app['config']->set('view.paths', [
            __DIR__ . '/views',
            __DIR__ . '/../stubs/components',
            __DIR__ . '/../resources/views',
            __DIR__ . '/../vendor/orchestra/testbench-core/laravel/views',
        ]);

        // Configuration des chemins de composants et de cache
        $this->app['config']->set('view.compiled', __DIR__ . '/storage/framework/views');

        // Copier les stubs des composants dans le répertoire de test
        $stubsPath = __DIR__ . '/../stubs/components';
        $testComponentsPath = __DIR__ . '/views/components/halo';

        if (is_dir($stubsPath)) {
            foreach (glob($stubsPath . '/*.blade.php') as $file) {
                $filename = basename($file);
                copy($file, $testComponentsPath . '/' . $filename);
            }
        }

        // Publier les composants pour les tests
        $this->artisan('vendor:publish', [
            '--tag' => 'halo-components',
            '--force' => true,
        ]);

        // Configuration du thème pour les tests
        $this->app['config']->set('halo.theme.colors', [
            'primary' => '#3B82F6',
            'secondary' => '#6B7280',
            'success' => '#10B981',
            'danger' => '#EF4444',
            'warning' => '#F59E0B',
            'info' => '#3B82F6',
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            HaloServiceProvider::class,
        ];
    }

    /**
     * Helper pour rendre un composant Blade.
     */
    protected function renderComponent(string $name, array $data = []): string
    {
        $attrs = collect($data)->map(function ($value, $key) {
            if (is_bool($value)) {
                return $value ? $key : '';
            }
            return sprintf('%s="%s"', $key, $value);
        })->filter()->implode(' ');

        return trim($this->blade(
            sprintf('<x-halo-%s %s />', $name, $attrs)
        ));
    }
}
