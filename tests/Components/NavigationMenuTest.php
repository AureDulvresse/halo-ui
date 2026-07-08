<?php

it('renders a nav wrapping a list of items', function () {
    $html = renderComponent('navigation-menu.index', ['slot' => 'Items']);

    expect($html)
        ->toContain('<nav')
        ->toContain('<ul')
        ->toContain('Items');
});

it('renders a link item when href is given', function () {
    $html = renderComponent('navigation-menu.item', ['href' => '/dashboard', 'slot' => 'Dashboard']);

    expect($html)
        ->toContainAttribute('href', '/dashboard')
        ->toContain('Dashboard');
});

it('marks an active link item with aria-current', function () {
    $html = renderComponent('navigation-menu.item', ['href' => '/dashboard', 'active' => true, 'slot' => 'Dashboard']);

    expect($html)->toContainAttribute('aria-current', 'page');
});

it('renders a submenu trigger reusing haloPopover when no href is given', function () {
    $html = renderComponent('navigation-menu.item', [
        'slot' => 'Panel content',
    ], [
        'trigger' => 'Products',
    ]);

    expect($html)
        ->toContain('haloPopover()')
        ->toContain('Products')
        ->toContain('Panel content')
        ->toContain('role="menu"');
});
