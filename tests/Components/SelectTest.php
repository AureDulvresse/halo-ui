<?php

it('renders a custom trigger button, not a native select', function () {
    $html = renderComponent('select.index');

    expect($html)->toContain('role="listbox"')
        ->and($html)->toContain('aria-haspopup="listbox"')
        ->and($html)->not->toContain('<select');
});

it('renders select.item options from the options prop', function () {
    $html = renderComponent('select.index', ['options' => ['fr' => 'France', 'us' => 'United States']]);

    expect($html)
        ->toContain('data-value="fr"')
        ->toContain('France')
        ->toContain('data-value="us"')
        ->toContain('United States');
});

it('renders slot content when no options prop is given', function () {
    $html = renderComponent('select.index', ['slot' => 'plain-slot-marker']);

    expect($html)->toContain('plain-slot-marker');
});

it('renders the chevron icon on the trigger', function () {
    expect(renderComponent('select.index'))->toContain('<svg');
});

it('shows the placeholder when no value is selected', function () {
    $html = renderComponent('select.index', ['placeholder' => 'Choose a country']);

    expect($html)->toContain('Choose a country');
});

it('pre-resolves the initial label server-side when a matching option exists', function () {
    $html = renderComponent('select.index', [
        'options' => ['fr' => 'France', 'us' => 'United States'],
        'value' => 'us',
    ]);

    expect($html)->toContain("haloSelect('us', 'United States')");
});

it('renders a hidden input mirroring the selected value when name is given', function () {
    $html = renderComponent('select.index', ['name' => 'country']);

    expect($html)->toContainAttribute('type', 'hidden')->toContainAttribute('name', 'country');
});

it('marks the trigger as invalid', function () {
    $html = renderComponent('select.index', ['invalid' => true]);

    expect($html)
        ->toContainAttribute('aria-invalid', 'true')
        ->toHaveClass('border-halo-danger');
});

it('can be disabled', function () {
    expect(renderComponent('select.index', ['disabled' => true]))->toContainAttribute('disabled');
});

it('renders an error message linked via aria-describedby', function () {
    $html = renderComponent('select.index', ['id' => 'country', 'error' => 'Pick a country']);

    expect($html)
        ->toContainAttribute('aria-invalid', 'true')
        ->toContainAttribute('aria-describedby', 'country-error')
        ->toContain('Pick a country');
});

it('renders a select.item option with the correct value and selection bindings', function () {
    $html = renderComponent('select.item', ['value' => 'fr', 'slot' => 'France']);

    expect($html)
        ->toContain('role="option"')
        ->toContainAttribute('data-value', 'fr')
        ->toContain('France');
});
