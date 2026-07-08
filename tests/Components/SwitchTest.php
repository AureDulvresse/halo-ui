<?php

it('renders a checkbox input with role=switch wrapped in a label', function () {
    $html = renderComponent('switch');

    expect($html)
        ->toContain('<label')
        ->toContainAttribute('type', 'checkbox')
        ->toContainAttribute('role', 'switch');
});

it('renders the slot as the visible label text', function () {
    expect(renderComponent('switch', ['slot' => 'Notifications']))->toContain('Notifications');
});

it('links the label to the input via a shared id', function () {
    $html = renderComponent('switch', ['id' => 'notifications']);

    expect($html)
        ->toContainAttribute('for', 'notifications')
        ->toContainAttribute('id', 'notifications');
});

it('can be disabled', function () {
    expect(renderComponent('switch', ['disabled' => true]))->toContainAttribute('disabled');
});
