<?php

it('renders a button with the slot content', function () {
    $html = renderComponent('toggle', ['slot' => 'Bold']);

    expect($html)
        ->toContain('<button')
        ->toContain('Bold');
});

it('starts unpressed by default', function () {
    $html = renderComponent('toggle', ['slot' => 'Bold']);

    expect($html)->toContain('x-data="{ pressed: false }"');
});

it('can start pressed', function () {
    $html = renderComponent('toggle', ['pressed' => true, 'slot' => 'Bold']);

    expect($html)->toContain('x-data="{ pressed: true }"');
});

it('toggles pressed state on click and binds aria-pressed', function () {
    $html = renderComponent('toggle', ['slot' => 'Bold']);

    expect($html)
        ->toContain('@click="pressed = !pressed"')
        ->toContain(':aria-pressed="pressed.toString()"');
});

it('applies the default variant and size classes', function () {
    $html = renderComponent('toggle', ['slot' => 'Bold']);

    expect($html)
        ->toHaveClass('bg-transparent')
        ->toHaveClass('px-3 py-1.5');
});

it('applies size classes', function () {
    $html = renderComponent('toggle', ['size' => 'lg', 'slot' => 'Bold']);

    expect($html)->toHaveClass('px-4 py-2');
});

it('renders an icon without crashing', function () {
    $html = renderComponent('toggle', ['icon' => 'check', 'slot' => 'Bold']);

    expect($html)
        ->toContain('Bold')
        ->toContain('<svg');
});
