<?php

use function Pest\Faker\faker;

test('button component renders correctly', function () {
    $html = render_component('button', [
        'variant' => 'primary',
        'size' => 'lg'
    ]);

    assertHasClass($html, 'bg-blue-600');
    assertHasClass($html, 'text-white');
    assertHasClass($html, 'px-6');
});

test('button supports glass effect', function () {
    $html = render_component('button', [
        'glass' => true
    ]);

    assertHasClass($html, 'backdrop-blur');
    assertHasClass($html, 'bg-white/80');
});

test('button handles disabled state', function () {
    $html = render_component('button', [
        'disabled' => true
    ]);

    assertHasClass($html, 'opacity-50');
    assertHasClass($html, 'cursor-not-allowed');
});
