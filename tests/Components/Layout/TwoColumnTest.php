<?php

it('renders the sidebar and main content slots', function () {
    $html = renderComponent('layout.two-column', [
        'slot' => 'Article body',
    ], ['sidebar' => 'Table of contents']);

    expect($html)
        ->toContain('Table of contents')
        ->toContain('Article body');
});

it('reverses the order when the sidebar is on the right', function () {
    expect(renderComponent('layout.two-column', ['sidebarPosition' => 'right', 'slot' => 'x']))
        ->toHaveClass('lg:flex-row-reverse');
});

it('does not reverse order by default', function () {
    expect(renderComponent('layout.two-column', ['slot' => 'x']))
        ->not->toContain('lg:flex-row-reverse');
});
