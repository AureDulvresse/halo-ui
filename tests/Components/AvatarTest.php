<?php

it('falls back to a generic user icon with no src or initials', function () {
    expect(renderComponent('avatar'))->toContain('<svg');
});

it('renders initials when given', function () {
    expect(renderComponent('avatar', ['initials' => 'AD']))->toContain('AD');
});

it('renders an image when given a src', function () {
    $html = renderComponent('avatar', ['src' => '/avatars/aure.jpg', 'alt' => 'Aure']);

    expect($html)
        ->toContain('<img')
        ->toContainAttribute('alt', 'Aure');
});

it('applies the correct size class', function () {
    expect(renderComponent('avatar', ['size' => 'lg']))->toHaveClass('w-12 h-12');
});

it('renders a status dot when given a status', function () {
    expect(renderComponent('avatar', ['status' => 'online']))->toHaveClass('bg-halo-success');
});

it('renders no status dot by default', function () {
    expect(renderComponent('avatar'))->not->toContain('border-2 border-halo-background');
});
