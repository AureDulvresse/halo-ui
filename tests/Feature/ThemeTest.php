<?php

use Tests\Traits\RendersComponents;

uses(RendersComponents::class);

test('les composants supportent les gradients', function (RendersComponents $test) {
    $button = render_component('button', [
        'variant' => 'primary',
        'gradient' => true
    ]);

    expect($button)
        ->toContain('bg-gradient-to-r')
        ->toContain('from-blue-600')
        ->toContain('to-indigo-600');
});

test('les composants supportent le glassmorphisme', function () {
    $card = render_component('card', [
        'glass' => true
    ]);

    expect($card)
        ->toContain('backdrop-blur-sm')
        ->toContain('bg-white/80');
});

test('les composants supportent les effets de glow', function () {
    $button = render_component('button', [
        'variant' => 'primary',
        'glow' => true
    ]);

    expect($button)->toContain('shadow-glow-primary');
});

test('les classes de thème sont correctement fusionnées', function () {
    $button = render_component('button', [
        'variant' => 'primary',
        'gradient' => true,
        'glow' => true,
        'class' => 'custom-class'
    ]);

    expect($button)
        ->toContain('bg-gradient-to-r')
        ->toContain('shadow-glow-primary')
        ->toContain('custom-class');
});

test('les variables CSS de thème sont disponibles', function () {
    $css = file_get_contents(public_path('vendor/halo-ui/css/halo.css'));

    expect($css)
        ->toContain('--halo-scroll-track')
        ->toContain('--halo-scroll-thumb')
        ->toContain('--halo-scroll-thumb-hover');
});


