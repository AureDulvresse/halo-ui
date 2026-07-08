<?php

it('renders a nav with breadcrumb label', function () {
    expect(renderComponent('breadcrumb.index', ['slot' => 'Items']))->toContainAttribute('aria-label', 'Breadcrumb');
});

it('renders a link item with a trailing separator icon', function () {
    $html = renderComponent('breadcrumb.item', ['href' => '/settings', 'slot' => 'Home']);

    expect($html)
        ->toContain('<a')
        ->toContainAttribute('href', '/settings')
        ->toContain('Home')
        ->toContain('<svg');
});

it('renders the current item as non-interactive text with no separator', function () {
    $html = renderComponent('breadcrumb.item', ['current' => true, 'slot' => 'Profile']);

    expect($html)
        ->not->toContain('<a')
        ->not->toContain('<svg')
        ->toContainAttribute('aria-current', 'page');
});
