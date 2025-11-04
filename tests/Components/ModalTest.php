<?php

it('renders a modal component', function () {
    $html = renderComponent('modal.index', ['slot' => 'Modal content']);

    expect($html)->toContain('role="dialog"');
    expect($html)->toContain('aria-modal="true"');
    expect($html)->toContain('Modal content');
});

it('applies size classes correctly', function () {
    $html = renderComponent('modal.index', [
        'size' => 'lg',
        'slot' => 'Large modal'
    ]);

    expect($html)->toContain('max-w-2xl');
});

it('includes Alpine.js data', function () {
    $html = renderComponent('modal.index', ['slot' => 'Content']);

    expect($html)->toContain('x-data');
    expect($html)->toContain('window.HaloUI.modal');
});

it('has backdrop with blur by default', function () {
    $html = renderComponent('modal.index', ['slot' => 'Content']);

    expect($html)->toContain('backdrop-blur');
});

it('can disable backdrop blur', function () {
    $html = renderComponent('modal.index', [
        'backdrop' => 'solid',
        'slot' => 'Content'
    ]);

    expect($html)->not->toContain('backdrop-blur');
});

it('has close button when closeable', function () {
    $headerHtml = renderComponent('modal.header', [
        'closeable' => true,
        'slot' => 'Modal Title'
    ]);

    expect($headerHtml)->toContain('hide()');
    expect($headerHtml)->toContain('Close');
});

it('renders modal body with padding', function () {
    $bodyHtml = renderComponent('modal.body', ['slot' => 'Body content']);

    expect($bodyHtml)->toContain('p-6');
    expect($bodyHtml)->toContain('Body content');
});

it('renders modal footer with actions', function () {
    $footerHtml = renderComponent('modal.footer', ['slot' => 'Footer actions']);

    expect($footerHtml)->toContain('flex');
    expect($footerHtml)->toContain('justify-end');
    expect($footerHtml)->toContain('Footer actions');
});
