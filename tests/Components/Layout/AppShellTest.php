<?php

it('renders the sidebar, topbar, and main content slots', function () {
    $html = renderComponent('layout.app-shell', [
        'slot' => 'Page content',
    ], ['sidebar' => 'Nav links', 'topbar' => 'Search bar']);

    expect($html)
        ->toContain('Nav links')
        ->toContain('Search bar')
        ->toContain('Page content');
});

it('wires up local sidebar-open state with a mobile toggle', function () {
    $html = renderComponent('layout.app-shell', ['slot' => 'Content']);

    expect($html)
        ->toContain('x-data="{ sidebarOpen: false }"')
        ->toContain('sidebarOpen = !sidebarOpen')
        ->toContainAttribute('aria-label', 'Toggle sidebar');
});

it('applies a custom sidebar width', function () {
    expect(renderComponent('layout.app-shell', ['sidebarWidth' => 'w-72', 'slot' => 'x']))
        ->toHaveClass('w-72');
});
