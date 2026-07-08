<?php

it('renders the slot content', function () {
    expect(renderComponent('label', ['slot' => 'Email']))->toContain('Email');
});

it('renders as a label element', function () {
    $html = renderComponent('label', ['for' => 'email', 'slot' => 'Email']);

    expect($html)->toContain('<label')
        ->and($html)->toContainAttribute('for', 'email');
});

it('marks required fields with an asterisk', function () {
    $html = renderComponent('label', ['required' => true, 'slot' => 'Email']);

    expect($html)->toContain('*')
        ->and($html)->toContain('aria-hidden="true"');
});

it('does not render an asterisk by default', function () {
    expect(renderComponent('label', ['slot' => 'Email']))->not->toContain('*');
});
