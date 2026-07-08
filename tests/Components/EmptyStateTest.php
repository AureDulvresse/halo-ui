<?php

it('renders the title', function () {
    expect(renderComponent('empty-state', ['title' => 'No results']))->toContain('No results');
});

it('renders an optional description', function () {
    $html = renderComponent('empty-state', ['title' => 'No results', 'description' => 'Try a different search.']);

    expect($html)->toContain('Try a different search.');
});

it('omits the description when none is given', function () {
    expect(renderComponent('empty-state', ['title' => 'No results']))->not->toContain('halo-foreground/60');
});

it('renders an optional icon', function () {
    $html = renderComponent('empty-state', ['title' => 'No results', 'icon' => 'search']);

    expect($html)->toContain('<svg');
});

it('renders an optional actions slot', function () {
    $html = renderComponent('empty-state', ['title' => 'No results'], ['actions' => 'Retry']);

    expect($html)->toContain('Retry');
});
