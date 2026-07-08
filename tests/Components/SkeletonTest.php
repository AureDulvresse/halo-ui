<?php

it('renders a status role for accessibility', function () {
    $html = renderComponent('skeleton');

    expect($html)
        ->toContainAttribute('role', 'status')
        ->toContainAttribute('aria-label', 'Loading')
        ->toHaveClass('animate-pulse')
        ->toHaveClass('bg-halo-secondary');
});

it('applies the default rectangle variant', function () {
    expect(renderComponent('skeleton'))->toHaveClass('rounded-halo');
});

it('applies the text variant', function () {
    $html = renderComponent('skeleton', ['variant' => 'text']);

    expect($html)
        ->toHaveClass('h-4')
        ->toHaveClass('rounded');
});

it('applies the circle variant', function () {
    $html = renderComponent('skeleton', ['variant' => 'circle']);

    expect($html)
        ->toHaveClass('rounded-full')
        ->toHaveClass('aspect-square');
});
