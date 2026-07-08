<?php

it('centers content with a default max width', function () {
    expect(renderComponent('layout.container', ['slot' => 'Content']))
        ->toContain('Content')
        ->toHaveClass('mx-auto')
        ->toHaveClass('max-w-6xl');
});

it('applies each size', function (string $size, string $expectedClass) {
    expect(renderComponent('layout.container', ['size' => $size, 'slot' => 'x']))->toHaveClass($expectedClass);
})->with([
    ['sm', 'max-w-3xl'],
    ['md', 'max-w-5xl'],
    ['xl', 'max-w-7xl'],
    ['full', 'max-w-none'],
]);
