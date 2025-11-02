<?php

test('toast notification shows and hides', function () {
    $html = render_component('toast', [
        'variant' => 'success',
        'message' => 'Operation successful',
        'dismissible' => true
    ]);

    expect($html)
        ->toContain('Operation successful')
        ->toContain('bg-green')
        ->toContain('@click="show = false"');
});

test('toast supports glass effect with transitions', function () {
    $html = render_component('toast', [
        'glass' => true,
        'animate' => 'slide'
    ]);

    assertHasClass($html, 'backdrop-blur');
    assertHasClass($html, 'animate-slide-up');
});

test('toast positions correctly', function () {
    $positions = ['top-right', 'top-left', 'bottom-right', 'bottom-left'];

    foreach ($positions as $position) {
        $html = render_component('toast', [
            'position' => $position
        ]);

        assertHasClass($html, $position);
    }
});
