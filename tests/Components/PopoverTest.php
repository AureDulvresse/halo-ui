<?php

it('renders the trigger and content slots', function () {
    $html = renderComponent('popover', [
        'slot' => 'Popover content',
    ], ['trigger' => 'Open popover']);

    expect($html)
        ->toContain('Open popover')
        ->toContain('Popover content');
});

it('wires up the haloPopover data and a dialog role', function () {
    $html = renderComponent('popover', ['slot' => 'Content']);

    expect($html)
        ->toContain('haloPopover()')
        ->toContainAttribute('role', 'dialog');
});

it('aligns to the right when requested', function () {
    expect(renderComponent('popover', ['align' => 'right']))->toHaveClass('right-0');
});

it('closes on escape and on an outside click', function () {
    $html = renderComponent('popover', ['slot' => 'Content']);

    expect($html)
        ->toContain('@keydown.escape="close()"')
        ->toContain('@click.outside="close()"');
});
