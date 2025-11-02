<?php

use Tests\Traits\RendersComponents;

uses(RendersComponents::class);

test('les nouveaux composants sont correctement rendus', function (RendersComponents $test) {
    // Test Chip
    $chip = render_component('chip', [
        'label' => 'Test',
        'removable' => true
    ]);
    expect($chip)
        ->toContain('Test')
        ->toContain('button type="button"');

    // Test ColorPicker
    $colorPicker = render_component('color-picker', [
        'value' => '#ff0000'
    ]);
    expect($colorPicker)
        ->toContain('type="color"')
        ->toContain('value="#ff0000"');

    // Test ImageCropper
    $imageCropper = render_component('image-cropper', [
        'src' => 'test.jpg',
        'aspect-ratio' => '16/9'
    ]);
    expect($imageCropper)
        ->toContain('test.jpg')
        ->toContain('16/9');

    // Test RichText
    $richText = render_component('rich-text', [
        'value' => 'Test content',
        'toolbar' => 'basic'
    ]);
    expect($richText)
        ->toContain('Test content')
        ->toContain('data-toolbar="basic"');
});

test('les composants supportent les nouveaux effets visuels', function () {
    // Test effet verre sur Card
    $card = render_component('card', ['glass' => true]);
    expect($card)->toContain('backdrop-blur-sm');

    // Test gradient sur Button
    $button = render_component('button', ['gradient' => true, 'variant' => 'primary']);
    expect($button)->toContain('bg-gradient-to-r');

    // Test glow sur Button
    $button = render_component('button', ['glow' => true, 'variant' => 'primary']);
    expect($button)->toContain('shadow-glow-primary');
});

test('les composants de layout fonctionnent correctement', function () {
    // Test BottomSheet
    $bottomSheet = render_component('bottom-sheet', [
        'title' => 'Test Sheet'
    ]);
    expect($bottomSheet)
        ->toContain('Test Sheet')
        ->toContain('fixed bottom-0');

    // Test CommandPalette
    $commandPalette = render_component('command-palette', [
        'placeholder' => 'Search...'
    ]);
    expect($commandPalette)
        ->toContain('Search...')
        ->toContain('role="combobox"');

    // Test TreeView
    $treeView = render_component('tree-view', [
        'expanded' => true
    ]);
    expect($treeView)->toContain('role="tree"');
});

test('les composants interactifs gèrent correctement les événements', function () {
    // Test Chip removable
    $chip = render_component('chip', [
        'label' => 'Test',
        'removable' => true,
        'onRemove' => 'removeChip'
    ]);
    expect($chip)->toContain('@click="removeChip"');

    // Test ContextMenu
    $contextMenu = render_component('context-menu', [
        'trigger' => 'Right click me'
    ]);
    expect($contextMenu)
        ->toContain('Right click me')
        ->toContain('@contextmenu.prevent');
});

