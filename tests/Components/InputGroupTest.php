<?php

it('renders the default slot content', function () {
    $html = renderComponent('input-group', ['slot' => 'the field']);

    expect($html)->toContain('the field');
});

it('renders a leading addon when given', function () {
    $html = renderComponent('input-group', ['slot' => 'field'], ['leading' => '$']);

    expect($html)->toContain('$');
});

it('renders a trailing addon when given', function () {
    $html = renderComponent('input-group', ['slot' => 'field'], ['trailing' => '.com']);

    expect($html)->toContain('.com');
});

it('does not render addon wrappers when no leading or trailing slot is given', function () {
    $html = renderComponent('input-group', ['slot' => 'field']);

    expect($html)->not->toContain('bg-halo-secondary');
});

it('strips the nested input border and ring so only the group border shows', function () {
    $html = renderComponent('input-group', ['slot' => 'field']);

    expect($html)
        ->toContain('[&amp;_input]:border-0')
        ->toContain('[&amp;_input]:ring-0');
});
