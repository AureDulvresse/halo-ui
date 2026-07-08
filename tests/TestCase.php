<?php

namespace Halo\UI\Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Halo\UI\Providers\HaloServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            BladeIconsServiceProvider::class,
            HaloServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('halo', require __DIR__.'/../config/halo.php');
    }
}
