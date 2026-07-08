<?php

it('renders a select element', function () {
    expect(renderComponent('select'))->toContain('<select');
});

it('renders options from the options prop', function () {
    $html = renderComponent('select', ['options' => ['fr' => 'France', 'us' => 'United States']]);

    expect($html)
        ->toContain('<option value="fr">France</option>')
        ->toContain('<option value="us">United States</option>');
});

it('renders slot content when no options prop is given', function () {
    $html = renderComponent('select', ['slot' => 'plain-slot-marker']);

    expect($html)->toContain('plain-slot-marker');
});

it('renders the chevron icon', function () {
    expect(renderComponent('select'))->toContain('<svg');
});

it('marks the field as invalid', function () {
    $html = renderComponent('select', ['invalid' => true]);

    expect($html)
        ->toContainAttribute('aria-invalid', 'true')
        ->toHaveClass('border-halo-danger');
});

it('can be disabled', function () {
    expect(renderComponent('select', ['disabled' => true]))->toContainAttribute('disabled');
});
