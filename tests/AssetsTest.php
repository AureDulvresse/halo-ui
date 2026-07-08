<?php

use Halo\UI\Providers\HaloServiceProvider;
use Illuminate\Support\Facades\Blade;

it('serves the built CSS and JS directly, with no publish step', function () {
    // The charset Symfony appends to the CSS Content-Type is cased
    // differently across platforms (UTF-8 on Windows, utf-8 on Linux CI) —
    // assert case-insensitively rather than pin an exact string.
    $css = $this->get(route('halo-ui.css'))->assertOk();
    expect(strtolower($css->headers->get('Content-Type')))->toContain('text/css');

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
