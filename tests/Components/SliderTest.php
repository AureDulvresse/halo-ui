<?php

it('renders a range input', function () {
    $html = renderComponent('slider');

    expect($html)->toContainAttribute('type', 'range');
});

it('applies min, max and step attributes', function () {
    $html = renderComponent('slider', ['min' => 10, 'max' => 50, 'step' => 5]);

    expect($html)
        ->toContainAttribute('min', '10')
        ->toContainAttribute('max', '50')
        ->toContainAttribute('step', '5');
});

it('defaults min to 0, max to 100 and step to 1', function () {
    $html = renderComponent('slider');

    expect($html)
        ->toContainAttribute('min', '0')
        ->toContainAttribute('max', '100')
        ->toContainAttribute('step', '1');
});

it('renders the given value as the initial value', function () {
    $html = renderComponent('slider', ['value' => 42]);

    expect($html)->toContainAttribute('value', '42');
});

it('can be disabled', function () {
    $html = renderComponent('slider', ['disabled' => true]);

    expect($html)->toContainAttribute('disabled');
});

it('auto-generates an id when none is given', function () {
    $html = renderComponent('slider');

    expect($html)->toContain('id="halo-slider-');
});

it('uses the name attribute as the id when no id is given', function () {
    $html = renderComponent('slider', ['name' => 'volume']);

    expect($html)->toContainAttribute('id', 'volume');
});

it('wires up a live value label when showValue is true', function () {
    $html = renderComponent('slider', ['showValue' => true, 'value' => 25]);

    expect($html)
        ->toContain('x-data="{ value: 25')
        ->toContain('x-model.number="value"')
        ->toContain('x-text="value"');
});

it('does not render a value label by default', function () {
    $html = renderComponent('slider');

    expect($html)->not->toContain('x-text="value"');
});
