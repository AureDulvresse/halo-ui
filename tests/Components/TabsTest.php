<?php

it('wires up the haloTabs data with the given default', function () {
    $html = renderComponent('tabs.index', ['default' => 'account', 'slot' => 'Content']);

    expect($html)->toContain("haloTabs('account')");
});

it('renders a tablist', function () {
    expect(renderComponent('tabs.list', ['slot' => 'Triggers']))->toContainAttribute('role', 'tablist');
});

it('supports arrow-key navigation between triggers', function () {
    $html = renderComponent('tabs.list', ['slot' => 'Triggers']);

    expect($html)
        ->toContain('focusSibling($event, 1)')
        ->toContain('focusSibling($event, -1)');
});

it('renders a trigger bound to its tab key', function () {
    $html = renderComponent('tabs.trigger', ['tab' => 'account', 'slot' => 'Account']);

    expect($html)
        ->toContainAttribute('role', 'tab')
        ->toContain("select('account')")
        ->toContain("isActive('account')");
});

it('renders a panel bound to its tab key', function () {
    $html = renderComponent('tabs.panel', ['tab' => 'account', 'slot' => 'Account settings']);

    expect($html)
        ->toContainAttribute('role', 'tabpanel')
        ->toContain('Account settings')
        ->toContain("isActive('account')");
});
