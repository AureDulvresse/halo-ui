<?php

it('renders the label and value', function () {
    $html = renderComponent('stat-card', ['label' => 'Revenue', 'value' => '$12,400']);

    expect($html)
        ->toContain('Revenue')
        ->toContain('$12,400');
});

it('renders an icon when given', function () {
    $html = renderComponent('stat-card', ['label' => 'Users', 'value' => '1,204', 'icon' => 'user']);

    expect($html)->toContain('<svg');
});

it('styles a positive trend as success', function () {
    $html = renderComponent('stat-card', ['label' => 'Users', 'value' => '1,204', 'trend' => '+12%']);

    expect($html)
        ->toContain('+12%')
        ->toHaveClass('text-halo-success');
});

it('styles a negative trend as danger', function () {
    $html = renderComponent('stat-card', ['label' => 'Users', 'value' => '1,204', 'trend' => '-3%']);

    expect($html)
        ->toContain('-3%')
        ->toHaveClass('text-halo-danger');
});

it('styles a neutral trend as muted', function () {
    $html = renderComponent('stat-card', ['label' => 'Users', 'value' => '1,204', 'trend' => '0%']);

    expect($html)
        ->toContain('0%')
        ->toHaveClass('text-halo-foreground/60');
});
