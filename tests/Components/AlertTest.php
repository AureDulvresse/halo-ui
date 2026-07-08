<?php

it('renders the slot content with an alert role', function () {
    $html = renderComponent('alert', ['slot' => 'Something happened']);

    expect($html)
        ->toContain('Something happened')
        ->toContainAttribute('role', 'alert');
});

it('defaults to the info variant with its matching icon', function () {
    $html = renderComponent('alert');

    expect($html)
        ->toHaveClass('bg-halo-info/10')
        ->toContain('<svg');
});

it('applies each variant token classes', function (string $variant, string $expectedClass) {
    expect(renderComponent('alert', ['variant' => $variant]))->toHaveClass($expectedClass);
})->with([
    ['success', 'bg-halo-success/10'],
    ['warning', 'bg-halo-warning/10'],
    ['danger', 'bg-halo-danger/10'],
]);

it('lets a custom icon override the variant default', function () {
    expect(renderComponent('alert', ['icon' => 'lock']))->toContain('<svg');
});

it('renders a dismiss button when dismissible', function () {
    $html = renderComponent('alert', ['dismissible' => true]);

    expect($html)
        ->toContain('x-data')
        ->toContain('aria-label="Dismiss"');
});

it('does not render a dismiss button by default', function () {
    expect(renderComponent('alert'))->not->toContain('aria-label="Dismiss"');
});
