<?php

test('glass effect works across components', function () {
    $components = ['button', 'card', 'toast', 'avatar'];

    foreach ($components as $component) {
        $html = render_component($component, [
            'glass' => true
        ]);

        assertHasClass($html, 'backdrop-blur');
        assertHasClass($html, 'bg-white/80');
    }
});

test('animation system is consistent', function () {
    $animations = ['fade', 'slide', 'scale'];

    foreach ($animations as $animation) {
        $html = render_component('notification', [
            'animate' => $animation
        ]);

        assertHasClass($html, "animate-{$animation}");
    }
});

test('dark mode support is implemented', function () {
    $html = render_component('card', [
        'dark' => true,
        'glass' => true
    ]);

    assertHasClass($html, 'dark:bg-gray-800/80');
    assertHasClass($html, 'dark:text-white');
});
