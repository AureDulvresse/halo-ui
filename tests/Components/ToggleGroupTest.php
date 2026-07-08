<?php

it('wires up the haloToggleGroup data with single type and no initial value', function () {
    $html = renderComponent('toggle-group.index', ['slot' => 'Items']);

    expect($html)->toContain("haloToggleGroup('single', null)");
});

it('wires up the haloToggleGroup data with the given type and initial value', function () {
    $html = renderComponent('toggle-group.index', ['type' => 'multiple', 'value' => ['bold'], 'slot' => 'Items']);

    expect($html)->toContain('haloToggleGroup(\'multiple\', [&quot;bold&quot;])');
});

it('has a group role', function () {
    $html = renderComponent('toggle-group.index', ['slot' => 'Items']);

    expect($html)->toContainAttribute('role', 'group');
});

it('renders an item bound to select and isSelected', function () {
    $html = renderComponent('toggle-group.item', ['value' => 'bold', 'slot' => 'B']);

    expect($html)
        ->toContain('B')
        ->toContain("select('bold')")
        ->toContain("isSelected('bold')")
        ->toContain(':aria-pressed="isSelected(\'bold\').toString()"');
});
