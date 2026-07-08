<?php

it('renders a checkbox input wrapped in a label', function () {
    $html = renderComponent('checkbox');

    expect($html)->toContain('<label')
        ->and($html)->toContain('type="checkbox"');
});

it('renders the slot as the visible label text', function () {
    expect(renderComponent('checkbox', ['slot' => 'Accept terms']))->toContain('Accept terms');
});

it('links the label to the input via a shared id', function () {
    $html = renderComponent('checkbox', ['id' => 'terms']);

    expect($html)
        ->toContainAttribute('for', 'terms')
        ->toContainAttribute('id', 'terms');
});

it('can be disabled', function () {
    expect(renderComponent('checkbox', ['disabled' => true]))->toContainAttribute('disabled');
});
