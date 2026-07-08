<?php

it('renders the trigger and the tooltip content', function () {
    $html = renderComponent('tooltip', ['slot' => 'Tooltip text'], ['trigger' => 'Hover me']);

    expect($html)
        ->toContain('Hover me')
        ->toContain('Tooltip text')
        ->toContainAttribute('role', 'tooltip');
});

it('positions the tooltip via the position prop', function (string $position, string $expectedClass) {
    $html = renderComponent('tooltip', ['position' => $position, 'slot' => 'Text']);

    expect($html)->toHaveClass($expectedClass);
})->with([
    ['top', 'bottom-full'],
    ['bottom', 'top-full'],
    ['left', 'right-full'],
    ['right', 'left-full'],
]);

it('is hidden until shown via x-show', function () {
    expect(renderComponent('tooltip', ['slot' => 'Text']))->toContain('x-show="open"');
});
