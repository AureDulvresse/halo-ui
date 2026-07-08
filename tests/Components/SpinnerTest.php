<?php

it('renders an animated svg', function () {
    $html = renderComponent('spinner');

    expect($html)
        ->toContain('<svg')
        ->toHaveClass('animate-spin');
});

it('applies the correct size class', function () {
    expect(renderComponent('spinner', ['size' => 'lg']))->toHaveClass('w-6 h-6');
});

it('exposes a status role for assistive tech', function () {
    expect(renderComponent('spinner'))->toContainAttribute('role', 'status');
});
