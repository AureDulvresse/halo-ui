<?php

it('renders an h1 by default', function () {
    expect(renderComponent('heading', ['slot' => 'Title']))
        ->toContain('<h1')
        ->toContain('Title')
        ->toContain('</h1>');
});

it('renders the requested heading level', function (int $level, string $tag) {
    $html = renderComponent('heading', ['level' => $level, 'slot' => 'Title']);

    expect($html)->toContain("<{$tag}")->toContain("</{$tag}>");
})->with([
    [2, 'h2'],
    [3, 'h3'],
    [6, 'h6'],
]);

it('clamps out-of-range levels to 1-6', function () {
    expect(renderComponent('heading', ['level' => 9, 'slot' => 'x']))->toContain('<h6');
    expect(renderComponent('heading', ['level' => 0, 'slot' => 'x']))->toContain('<h1');
});

it('lets a custom size override the level default', function () {
    expect(renderComponent('heading', ['level' => 1, 'size' => 'text-sm', 'slot' => 'x']))
        ->toHaveClass('text-sm');
});
