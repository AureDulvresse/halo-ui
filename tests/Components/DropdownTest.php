<?php

it('renders the trigger and content slots', function () {
    $html = renderComponent('dropdown.index', [
        'slot' => 'Menu content',
    ], ['trigger' => 'Open menu']);

    expect($html)
        ->toContain('Open menu')
        ->toContain('Menu content');
});

it('wires up the haloDropdown data and a menu role', function () {
    $html = renderComponent('dropdown.index', ['slot' => 'Items']);

    expect($html)
        ->toContain('haloDropdown()')
        ->toContainAttribute('role', 'menu');
});

it('aligns to the right when requested', function () {
    expect(renderComponent('dropdown.index', ['align' => 'right']))->toHaveClass('right-0');
});

it('supports arrow-key navigation and closes the menu when an item is clicked', function () {
    $html = renderComponent('dropdown.index', ['slot' => 'Items']);

    expect($html)
        ->toContain('focusNext()')
        ->toContain('focusPrevious()')
        ->toContain('closeOnItemClick($event)');
});

it('renders an item as a link when given an href', function () {
    $html = renderComponent('dropdown.item', ['href' => '/profile', 'slot' => 'Profile']);

    expect($html)
        ->toContain('<a')
        ->toContainAttribute('href', '/profile')
        ->toContainAttribute('role', 'menuitem');
});

it('renders an item as a button with no href', function () {
    $html = renderComponent('dropdown.item', ['slot' => 'Sign out']);

    expect($html)
        ->toContain('<button')
        ->toContain('Sign out');
});
