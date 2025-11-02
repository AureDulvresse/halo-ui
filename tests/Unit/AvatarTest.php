<?php

test('avatar component renders with image', function () {
    $src = fake()->imageUrl();
    $html = render_component('avatar', [
        'src' => $src,
        'alt' => 'User avatar'
    ]);

    assertHasClass($html, 'overflow-hidden');
    expect($html)->toContain($src);
    expect($html)->toContain('User avatar');
});

test('avatar shows initials when no image', function () {
    $html = render_component('avatar', [
        'fallback' => 'JD'
    ]);

    expect($html)->toContain('JD');
});

test('avatar group stacks correctly', function () {
    $html = render_component('avatar-group', [
        'max' => 3
    ]);

    assertHasClass($html, 'flex');
    assertHasClass($html, '-space-x-2');
});
