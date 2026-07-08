<?php

it('wires up the haloRating data with the initial value and max', function () {
    expect(renderComponent('rating'))->toContain('haloRating(0, 5)');
});

it('passes value and max through to the Alpine data', function () {
    expect(renderComponent('rating', ['value' => 3, 'max' => 10]))->toContain('haloRating(3, 10)');
});

it('renders a radiogroup with a radio button per star', function () {
    $html = renderComponent('rating', ['max' => 5]);

    expect(substr_count($html, 'role="radio"'))->toBe(5);
});

it('renders a hidden input when a name is given', function () {
    $html = renderComponent('rating', ['name' => 'score']);

    expect($html)
        ->toContainAttribute('type', 'hidden')
        ->toContainAttribute('name', 'score');
});

it('omits the hidden input when no name is given', function () {
    expect(renderComponent('rating'))->not->toContainAttribute('type', 'hidden');
});

it('disables the stars when readonly', function () {
    expect(renderComponent('rating', ['readonly' => true]))->toContainAttribute('disabled');
});
