<?php

it('renders the scrollable wrapper with the slot content', function () {
    $html = renderComponent('scroll-area', ['slot' => 'Long content']);

    expect($html)
        ->toHaveClass('overflow-auto')
        ->toHaveClass('halo-scroll-area')
        ->toContain('Long content');
});

it('applies a max-height style when height is given', function () {
    $html = renderComponent('scroll-area', ['height' => '20rem', 'slot' => 'Long content']);

    expect($html)->toContain('style="max-height: 20rem"');
});

it('does not add an inline style when no height is given', function () {
    $html = renderComponent('scroll-area', ['slot' => 'Long content']);

    expect($html)->not->toContain('style=');
});
