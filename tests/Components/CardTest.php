<?php

it('renders the slot content', function () {
    expect(renderComponent('card.index', ['slot' => 'Card body']))->toContain('Card body');
});

it('defaults to the default variant', function () {
    expect(renderComponent('card.index'))->toHaveClass('border-halo-border');
});

it('applies the elevated variant', function () {
    expect(renderComponent('card.index', ['variant' => 'elevated']))->toHaveClass('shadow-lg');
});

it('renders a header with a bottom border', function () {
    expect(renderComponent('card.header', ['slot' => 'Title']))
        ->toContain('Title')
        ->toHaveClass('border-b');
});

it('renders a body', function () {
    expect(renderComponent('card.body', ['slot' => 'Content']))->toContain('Content');
});

it('renders a footer with a top border', function () {
    expect(renderComponent('card.footer', ['slot' => 'Actions']))
        ->toContain('Actions')
        ->toHaveClass('border-t');
});
