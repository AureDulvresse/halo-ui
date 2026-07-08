<?php

it('renders a paragraph by default', function () {
    expect(renderComponent('text', ['slot' => 'Body copy']))
        ->toContain('<p')
        ->toContain('Body copy');
});

it('renders the requested tag', function () {
    expect(renderComponent('text', ['as' => 'span', 'slot' => 'x']))->toContain('<span');
});

it('falls back to a paragraph for a tag outside the whitelist', function () {
    expect(renderComponent('text', ['as' => 'script', 'slot' => 'x']))
        ->toContain('<p')
        ->not->toContain('<script');
});

it('applies the muted color', function () {
    expect(renderComponent('text', ['muted' => true, 'slot' => 'x']))->toHaveClass('text-halo-foreground/60');
});
