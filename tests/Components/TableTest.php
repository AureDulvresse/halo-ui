<?php

it('wraps the table in a horizontally scrollable container', function () {
    $html = renderComponent('table.index', ['slot' => 'Rows']);

    expect($html)
        ->toContain('overflow-x-auto')
        ->toContain('<table')
        ->toContain('Rows');
});

it('renders a header row without the hover highlight', function () {
    expect(renderComponent('table.row', ['header' => true, 'slot' => 'x']))
        ->not->toContain('hover:bg-halo-secondary/50');
});

it('renders a data row with the hover highlight', function () {
    expect(renderComponent('table.row', ['slot' => 'x']))->toHaveClass('hover:bg-halo-secondary/50');
});

it('renders a header cell with scope=col', function () {
    expect(renderComponent('table.head', ['slot' => 'Name']))
        ->toContain('<th')
        ->toContainAttribute('scope', 'col')
        ->toContain('Name');
});

it('renders a data cell', function () {
    expect(renderComponent('table.cell', ['slot' => 'Ada Lovelace']))
        ->toContain('<td')
        ->toContain('Ada Lovelace');
});
