<?php

it('renders a dialog wired to its name via haloModal', function () {
    $html = renderComponent('modal.index', ['name' => 'user-modal', 'slot' => 'Content']);

    expect($html)
        ->toContain("haloModal('user-modal')")
        ->toContainAttribute('role', 'dialog')
        ->toContainAttribute('aria-modal', 'true')
        ->toContain('Content');
});

it('is hidden until opened', function () {
    expect(renderComponent('modal.index', ['name' => 'x']))->toContain('style="display: none;"');
});

it('applies the correct size class', function () {
    expect(renderComponent('modal.index', ['name' => 'x', 'size' => 'lg']))->toHaveClass('max-w-2xl');
});

it('renders a close button', function () {
    expect(renderComponent('modal.index', ['name' => 'x']))->toContain('aria-label="Close"');
});

it('traps focus within the panel on tab and is itself focusable as a fallback', function () {
    $html = renderComponent('modal.index', ['name' => 'x']);

    expect($html)
        ->toContain('trapFocus($event)')
        ->toContainAttribute('tabindex', '-1');
});

it('renders a header with a bottom border and room for the close button', function () {
    expect(renderComponent('modal.header', ['slot' => 'Title']))
        ->toContain('Title')
        ->toHaveClass('border-b')
        ->toHaveClass('pr-12');
});

it('renders a body', function () {
    expect(renderComponent('modal.body', ['slot' => 'Body content']))->toContain('Body content');
});

it('renders a footer with actions aligned to the end', function () {
    expect(renderComponent('modal.footer', ['slot' => 'Actions']))
        ->toContain('Actions')
        ->toHaveClass('justify-end');
});
