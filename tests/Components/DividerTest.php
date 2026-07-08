<?php

it('renders a horizontal rule by default', function () {
    expect(renderComponent('divider'))->toContain('<hr');
});

it('renders a vertical separator', function () {
    $html = renderComponent('divider', ['orientation' => 'vertical']);

    expect($html)
        ->not->toContain('<hr')
        ->toContainAttribute('aria-orientation', 'vertical');
});

it('renders a labeled divider', function () {
    $html = renderComponent('divider', ['label' => 'OR']);

    expect($html)
        ->toContain('OR')
        ->not->toContain('<hr');
});

it('exposes a separator role', function () {
    expect(renderComponent('divider'))->toContainAttribute('role', 'separator');
});
