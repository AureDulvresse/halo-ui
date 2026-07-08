<?php

it('renders a kbd element with the slot content', function () {
    $html = renderComponent('kbd', ['slot' => 'Ctrl']);

    expect($html)
        ->toContain('<kbd')
        ->and($html)->toContain('Ctrl');
});

it('applies the default styling classes', function () {
    $html = renderComponent('kbd', ['slot' => 'Esc']);

    expect($html)
        ->toHaveClass('bg-halo-secondary')
        ->toHaveClass('border-halo-border')
        ->toHaveClass('font-mono');
});
