<?php

// Regression guard for a bug that hit every single component: each one reads
// $attributes->get('class') to fold a consumer's class into its own variant
// classes, then calls $attributes->merge(['class' => $computed]). Laravel's
// ComponentAttributeBag::merge() appends whatever 'class' is still in the
// bag on top of that — so unless 'class' is excluded first, the consumer's
// class ends up twice. Checked across every component that accepts a class.
it('renders a consumer-provided class exactly once', function (string $component, array $props) {
    $html = renderComponent($component, [...$props, 'class' => 'my-custom-marker']);

    expect(substr_count($html, 'my-custom-marker'))->toBe(1);
})->with([
    'icon' => ['icon', ['name' => 'check']],
    'button' => ['button', ['slot' => 'Save']],
    'input' => ['input', []],
    'textarea' => ['textarea', []],
    'label' => ['label', ['slot' => 'Email']],
    'checkbox' => ['checkbox', []],
    'radio' => ['radio', []],
    'select' => ['select', []],
    'badge' => ['badge', ['slot' => 'New']],
    'avatar' => ['avatar', []],
    'spinner' => ['spinner', []],
    'divider' => ['divider', []],
    'card.index' => ['card.index', ['slot' => 'Body']],
    'card.header' => ['card.header', ['slot' => 'Title']],
    'card.body' => ['card.body', ['slot' => 'Body']],
    'card.footer' => ['card.footer', ['slot' => 'Actions']],
    'alert' => ['alert', ['slot' => 'Message']],
    'modal.index' => ['modal.index', ['name' => 'demo']],
    'modal.header' => ['modal.header', ['slot' => 'Title']],
    'modal.body' => ['modal.body', ['slot' => 'Body']],
    'modal.footer' => ['modal.footer', ['slot' => 'Actions']],
    'dropdown.index' => ['dropdown.index', ['slot' => 'Items']],
    'dropdown.item' => ['dropdown.item', ['slot' => 'Item']],
    'toast' => ['toast', []],
    'switch' => ['switch', []],
    'progress' => ['progress', []],
    'tooltip' => ['tooltip', ['slot' => 'Text']],
    'popover' => ['popover', ['slot' => 'Content']],
    'layout.app-shell' => ['layout.app-shell', ['slot' => 'Content']],
    'layout.auth' => ['layout.auth', ['slot' => 'Content']],
    'layout.two-column' => ['layout.two-column', ['slot' => 'Content']],
    'layout.page-header' => ['layout.page-header', ['title' => 'Title']],
    'layout.container' => ['layout.container', ['slot' => 'Content']],
    'heading' => ['heading', ['slot' => 'Title']],
    'text' => ['text', ['slot' => 'Body']],
    'file-upload' => ['file-upload', []],
    'image-upload' => ['image-upload', []],
    'table.index' => ['table.index', ['slot' => 'Rows']],
    'table.row' => ['table.row', ['slot' => 'x']],
    'table.head' => ['table.head', ['slot' => 'Name']],
    'table.cell' => ['table.cell', ['slot' => 'Value']],
]);
