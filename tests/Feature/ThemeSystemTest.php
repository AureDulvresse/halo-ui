<?php

test('animation system is consistent', function () {
    $animations = ['fade', 'slide', 'scale'];

    foreach ($animations as $animation) {
        $html = render_component('notification', [
            'animate' => $animation
        ]);

        assertHasClass($html, "animate-{$animation}");
    }
});
