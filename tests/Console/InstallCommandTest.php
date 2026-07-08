<?php

use Illuminate\Support\Facades\File;

afterEach(function () {
    File::deleteDirectory(resource_path('views/components/halo'));
});

it('ejects every component by default (no arguments, no flags)', function () {
    $this->artisan('halo:install')->assertExitCode(0);

    expect(file_exists(resource_path('views/components/halo/button.blade.php')))->toBeTrue()
        ->and(file_exists(resource_path('views/components/halo/modal/index.blade.php')))->toBeTrue();
});

it('ejects every component with --all', function () {
    $this->artisan('halo:install', ['--all' => true])->assertExitCode(0);

    expect(file_exists(resource_path('views/components/halo/input.blade.php')))->toBeTrue();
});

it('ejects only the requested components', function () {
    $this->artisan('halo:install', ['components' => ['button']])->assertExitCode(0);

    expect(file_exists(resource_path('views/components/halo/button.blade.php')))->toBeTrue()
        ->and(file_exists(resource_path('views/components/halo/input.blade.php')))->toBeFalse();
});

it('ejects a modular (directory-based) component by name', function () {
    $this->artisan('halo:install', ['components' => ['modal']])->assertExitCode(0);

    expect(file_exists(resource_path('views/components/halo/modal/index.blade.php')))->toBeTrue()
        ->and(file_exists(resource_path('views/components/halo/modal/header.blade.php')))->toBeTrue();
});

it('warns about an unknown component without failing the command', function () {
    $this->artisan('halo:install', ['components' => ['does-not-exist']])
        ->expectsOutputToContain('not found')
        ->assertExitCode(0);
});

it('does not overwrite an existing file unless --force is given', function () {
    $this->artisan('halo:install', ['components' => ['button']])->assertExitCode(0);

    $path = resource_path('views/components/halo/button.blade.php');
    file_put_contents($path, '<!-- customized -->');

    $this->artisan('halo:install', ['components' => ['button']])->assertExitCode(0);
    expect(file_get_contents($path))->toContain('customized');

    $this->artisan('halo:install', ['components' => ['button'], '--force' => true])->assertExitCode(0);
    expect(file_get_contents($path))->not->toContain('customized');
});

it('accepts --no-assets and --force without error', function () {
    $this->artisan('halo:install', ['--no-assets' => true, '--force' => true])->assertExitCode(0);
});
