<?php

namespace Halo\UI\Tests;

use Halo\UI\Providers\HaloServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Additional setup
    }

    protected function getPackageProviders($app): array
    {
        return [
            HaloServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        // Load HaloUI config
        $app['config']->set('halo', require __DIR__.'/../config/halo.php');
    }

    /**
     * Render a Blade component view.
     */
    protected function renderComponent(string $component, array $data = []): string
    {
        return view("halo::components.halo.{$component}", $data)->render();
    }

    /**
     * Assert that rendered HTML contains a specific class.
     */
    protected function assertHasClass(string $html, string $class): void
    {
        $this->assertStringContainsString($class, $html);
    }

    /**
     * Assert that rendered HTML contains a specific attribute.
     */
    protected function assertHasAttribute(string $html, string $attribute, ?string $value = null): void
    {
        if ($value === null) {
            $this->assertStringContainsString($attribute, $html);
        } else {
            $this->assertStringContainsString("{$attribute}=\"{$value}\"", $html);
        }
    }
}
