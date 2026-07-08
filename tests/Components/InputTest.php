<?php

it('renders an input element', function () {
    expect(renderComponent('input'))->toContain('<input');
});

it('auto-generates an id when none is given', function () {
    $html = renderComponent('input');

    expect($html)->toContain('id="halo-input-');
});

it('uses the given id when provided', function () {
    $html = renderComponent('input', ['id' => 'email-field']);

    expect($html)->toContainAttribute('id', 'email-field');
});

it('marks the field as invalid', function () {
    $html = renderComponent('input', ['invalid' => true]);

    expect($html)
        ->toContainAttribute('aria-invalid', 'true')
        ->toHaveClass('border-halo-danger');
});

it('adds left padding when an icon is on the left', function () {
    $html = renderComponent('input', ['icon' => 'mail']);

    expect($html)->toHaveClass('pl-10');
});

it('adds right padding when an icon is on the right', function () {
    $html = renderComponent('input', ['icon' => 'mail', 'iconPosition' => 'right']);

    expect($html)->toHaveClass('pr-10');
});

it('can be disabled', function () {
    $html = renderComponent('input', ['disabled' => true]);

    expect($html)->toContainAttribute('disabled');
});
