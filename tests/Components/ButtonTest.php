<?php

it('renders a button with the slot content', function () {
    $html = renderComponent('button', ['slot' => 'Click me']);

    expect($html)->toContain('<button')
        ->and($html)->toContain('Click me');
});

it('applies the default variant and size classes', function () {
    $html = renderComponent('button', ['slot' => 'Save']);

    expect($html)
        ->toHaveClass('bg-halo-primary')
        ->toHaveClass('text-halo-primary-foreground')
        ->toHaveClass('px-4 py-2');
});

it('applies size classes', function () {
    $html = renderComponent('button', ['size' => 'lg', 'slot' => 'Big']);

    expect($html)->toHaveClass('px-6 py-3');
});

it('is disabled and marked busy while loading', function () {
    $html = renderComponent('button', ['loading' => true, 'slot' => 'Loading']);

    expect($html)
        ->toContainAttribute('disabled')
        ->toContainAttribute('aria-busy', 'true')
        ->toContain('animate-spin');
});

it('can be disabled', function () {
    $html = renderComponent('button', ['disabled' => true, 'slot' => 'Disabled']);

    expect($html)->toContainAttribute('disabled');
});

it('renders an icon without crashing', function () {
    $html = renderComponent('button', ['icon' => 'check', 'slot' => 'With Icon']);

    expect($html)
        ->toContain('With Icon')
        ->and($html)->toContain('<svg');
});

it('has the correct button type', function () {
    $html = renderComponent('button', ['type' => 'submit', 'slot' => 'Submit']);

    expect($html)->toContainAttribute('type', 'submit');
});
