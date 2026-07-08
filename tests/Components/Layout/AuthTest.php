<?php

it('centers the slot content', function () {
    $html = renderComponent('layout.auth', ['slot' => 'Login form']);

    expect($html)
        ->toContain('Login form')
        ->toHaveClass('items-center justify-center');
});

it('renders an optional logo slot above the content', function () {
    expect(renderComponent('layout.auth', ['slot' => 'x'], ['logo' => 'Acme Inc.']))->toContain('Acme Inc.');
});

it('applies a custom max width', function () {
    expect(renderComponent('layout.auth', ['maxWidth' => 'max-w-md', 'slot' => 'x']))->toContain('max-w-md');
});
