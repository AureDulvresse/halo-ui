<?php

declare(strict_types=1);

namespace Halo\UI\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase;

class InstallComponentTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [\Halo\UI\Providers\HaloUIServiceProvider::class];
    }

    public function test_button_component_installation()
    {
        $target = resource_path('views/components/flux/button.blade.php');

        if (File::exists($target)) {
            File::delete($target);
        }

        Artisan::call('flux:install', ['components' => ['button'], '--force' => true]);
        $this->assertFileExists($target);
    }
}
