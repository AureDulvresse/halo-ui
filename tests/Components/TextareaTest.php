<?php

it('renders a textarea with the slot content', function () {
    expect(renderComponent('textarea', ['slot' => 'Hello']))
        ->toContain('<textarea')
        ->toContain('Hello');
});

it('applies the default size classes', function () {
    $html = renderComponent('textarea');

    expect($html)
        ->toHaveClass('px-4 py-2')
        ->toHaveClass('text-base');
});

it('applies the rows attribute', function () {
    expect(renderComponent('textarea', ['rows' => 6]))->toContainAttribute('rows', '6');
});

it('applies the resize variant', function () {
    expect(renderComponent('textarea', ['resize' => 'none']))->toHaveClass('resize-none');
});

it('marks the field as invalid', function () {
    $html = renderComponent('textarea', ['invalid' => true]);

    expect($html)
        ->toContainAttribute('aria-invalid', 'true')
        ->toHaveClass('border-halo-danger');
});

it('can be disabled', function () {
    expect(renderComponent('textarea', ['disabled' => true]))->toContainAttribute('disabled');
});

it('auto-generates an id when none is given', function () {
    expect(renderComponent('textarea'))->toContain('id="halo-textarea-');
});
