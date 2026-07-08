<?php

it('renders a radio input wrapped in a label', function () {
    $html = renderComponent('radio');

    expect($html)->toContain('<label')
        ->and($html)->toContain('type="radio"');
});

it('renders the slot as the visible label text', function () {
    expect(renderComponent('radio', ['slot' => 'Option A']))->toContain('Option A');
});

it('does not derive its id from the shared radio group name', function () {
    // Multiple radios in a group share the same `name` — falling back to it
    // for `id` would produce duplicate ids across the group.
    $first = renderComponent('radio', ['name' => 'plan']);
    $second = renderComponent('radio', ['name' => 'plan']);

    preg_match('/id="([^"]+)"/', $first, $firstId);
    preg_match('/id="([^"]+)"/', $second, $secondId);

    expect($firstId[1])->not->toBe($secondId[1]);
});

it('can be disabled', function () {
    expect(renderComponent('radio', ['disabled' => true]))->toContainAttribute('disabled');
});
