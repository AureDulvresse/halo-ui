<?php

it('renders an alertdialog wired to its name via haloAlertDialog', function () {
    $html = renderComponent('alert-dialog.index', ['name' => 'confirm-delete', 'slot' => 'Content']);

    expect($html)
        ->toContain("haloAlertDialog('confirm-delete')")
        ->toContainAttribute('role', 'alertdialog')
        ->toContainAttribute('aria-modal', 'true')
        ->toContain('Content');
});

it('is hidden until opened', function () {
    expect(renderComponent('alert-dialog.index', ['name' => 'x']))->toContain('style="display: none;"');
});

it('does not close on backdrop click or escape', function () {
    $html = renderComponent('alert-dialog.index', ['name' => 'x']);

    expect($html)
        ->not->toContain('@click="close()"')
        ->not->toContain('@click.outside="close()"')
        ->not->toContain('@keydown.escape.window="close()"');
});

it('does not render a dismiss button', function () {
    expect(renderComponent('alert-dialog.index', ['name' => 'x']))->not->toContain('aria-label="Close"');
});

it('traps focus within the panel on tab', function () {
    expect(renderComponent('alert-dialog.index', ['name' => 'x']))
        ->toContain('trapFocus($event)')
        ->toContainAttribute('tabindex', '-1');
});

it('applies the correct size class', function () {
    expect(renderComponent('alert-dialog.index', ['name' => 'x', 'size' => 'lg']))->toHaveClass('max-w-2xl');
});

it('renders a header with a bottom border', function () {
    expect(renderComponent('alert-dialog.header', ['slot' => 'Are you sure?']))
        ->toContain('Are you sure?')
        ->toHaveClass('border-b');
});

it('renders a body', function () {
    expect(renderComponent('alert-dialog.body', ['slot' => 'This cannot be undone.']))->toContain('This cannot be undone.');
});

it('renders a footer with actions aligned to the end', function () {
    expect(renderComponent('alert-dialog.footer', ['slot' => 'Actions']))
        ->toContain('Actions')
        ->toHaveClass('justify-end');
});
