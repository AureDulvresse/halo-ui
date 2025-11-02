<?php

test('button component renders correctly', function () {
    $html = render_component('button', [
        'variant' => 'primary',
        'size' => 'lg'
    ]);

    assertHasClass($html, 'bg-blue-600');
    assertHasClass($html, 'text-white');
    assertHasClass($html, 'px-5');
});