<?php

it('renders the slot content', function () {
    expect(renderComponent('badge', ['slot' => 'New']))->toContain('New');
});

it('defaults to the secondary variant', function () {
    $html = renderComponent('badge', ['slot' => 'New']);

    expect($html)->toHaveClass('bg-halo-secondary');
});

it('applies each variant token classes', function (string $variant, string $expectedClass) {
    $html = renderComponent('badge', ['variant' => $variant, 'slot' => 'Badge']);

    expect($html)->toHaveClass($expectedClass);
})->with([
    ['primary', 'bg-halo-primary/10'],
    ['success', 'bg-halo-success/10'],
    ['danger', 'bg-halo-danger/10'],
    ['warning', 'bg-halo-warning/10'],
]);
