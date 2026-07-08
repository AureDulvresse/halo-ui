<?php

use Halo\UI\Providers\HaloServiceProvider;
use Illuminate\Support\Facades\Blade;

it('serves the built CSS and JS directly, with no publish step', function () {
    $this->get(route('halo-ui.css'))
        ->assertOk()
        ->assertHeader('Content-Type', 'text/css; charset=UTF-8');

    $this->get(route('halo-ui.js'))
        ->assertOk()
        ->assertHeader('Content-Type', 'application/javascript');
});

it('renders @haloStyles and @haloScripts pointing at the asset routes', function () {
    $html = Blade::render('@haloStyles @haloScripts');

    expect($html)
        ->toContain('<link rel="stylesheet" href="'.route('halo-ui.css').'">')
        ->toContain('<script src="'.route('halo-ui.js').'" defer></script>');
});

it('points at the published path when asset serving is disabled', function () {
    config(['halo.assets.serve' => false]);

    expect(HaloServiceProvider::styleUrl())->toBe(asset('vendor/halo-ui/css/halo.css'))
        ->and(HaloServiceProvider::scriptUrl())->toBe(asset('vendor/halo-ui/js/init.js'));
});
