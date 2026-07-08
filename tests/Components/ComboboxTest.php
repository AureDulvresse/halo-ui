<?php

it('wires up the haloCombobox data with an initial value', function () {
    $html = renderComponent('combobox.index', ['value' => 'fr', 'slot' => 'Options']);

    expect($html)->toContain("haloCombobox('fr')");
});

it('defaults the initial value to null', function () {
    $html = renderComponent('combobox.index', ['slot' => 'Options']);

    expect($html)->toContain('haloCombobox(null)');
});

it('renders a hidden input for the given name', function () {
    $html = renderComponent('combobox.index', ['name' => 'country', 'slot' => 'Options']);

    expect($html)
        ->toContain('type="hidden"')
        ->toContainAttribute('name', 'country')
        ->toContain(':value="selected"');
});

it('omits the hidden input when no name is given', function () {
    $html = renderComponent('combobox.index', ['slot' => 'Options']);

    expect($html)->not->toContain('type="hidden"');
});

it('renders the text input as a combobox with the placeholder', function () {
    $html = renderComponent('combobox.index', ['placeholder' => 'Pick a country', 'slot' => 'Options']);

    expect($html)
        ->toContainAttribute('role', 'combobox')
        ->toContainAttribute('placeholder', 'Pick a country')
        ->toContain('@focus="openPanel()"')
        ->toContain('@input="query = $event.target.value; open = true"');
});

it('renders the listbox panel', function () {
    $html = renderComponent('combobox.index', ['slot' => 'Options']);

    expect($html)
        ->toContainAttribute('role', 'listbox')
        ->toContain('x-show="open"');
});

it('renders an option with a select handler and filter binding', function () {
    $html = renderComponent('combobox.option', ['value' => 'fr', 'slot' => 'France']);

    expect($html)
        ->toContain('<li')
        ->toContainAttribute('role', 'option')
        ->toContainAttribute('data-value', 'fr')
        ->toContain("select('fr', \$el.textContent.trim())")
        ->toContain('x-show="matches($el.textContent, query)"')
        ->toContain('France');
});
