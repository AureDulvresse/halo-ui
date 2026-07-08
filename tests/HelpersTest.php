<?php

it('keeps only the last class within a deduped family', function () {
    expect(halo_merge_classes('px-2 py-1', 'px-4'))->toBe('px-4 py-1');
});

it('does not dedupe a border side/width against a border color', function () {
    // Regression guard: border-b (side) and border-halo-border (color) look
    // like the same "border-" family under a naive prefix match, but they
    // set different CSS properties and must both survive.
    expect(halo_merge_classes('border-b border-halo-border'))
        ->toContain('border-b')
        ->toContain('border-halo-border');
});

it('does not dedupe a rounded corner against a rounded radius token', function () {
    expect(halo_merge_classes('rounded-t rounded-halo'))
        ->toContain('rounded-t')
        ->toContain('rounded-halo');
});

it('still dedupes two radius tokens against each other', function () {
    expect(halo_merge_classes('rounded-halo', 'rounded-full'))->toBe('rounded-full');
});

it('passes through classes outside any tracked family untouched', function () {
    expect(halo_merge_classes('flex items-center', 'justify-between'))
        ->toBe('flex items-center justify-between');
});

it('does not dedupe a text size against a text color', function () {
    // Regression guard: Button's variant contributes a text color
    // (text-halo-primary-foreground) and its size contributes a font size
    // (text-base) — both look like the "text-" family under a naive prefix
    // match, but a real render previously lost the color entirely, leaving
    // every button's text an unstyled inherited color.
    expect(halo_merge_classes('text-halo-primary-foreground text-base'))
        ->toContain('text-halo-primary-foreground')
        ->toContain('text-base');
});

it('still dedupes two text colors against each other', function () {
    expect(halo_merge_classes('text-halo-primary', 'text-halo-danger'))->toBe('text-halo-danger');
});

it('does not dedupe text alignment against a text color', function () {
    expect(halo_merge_classes('text-center text-halo-foreground'))
        ->toContain('text-center')
        ->toContain('text-halo-foreground');
});

it('reproduces the button primary-variant render and keeps its text color', function () {
    // End-to-end guard at the level the bug was actually caught: rendering
    // the real component, not just calling the helper directly.
    $html = renderComponent('button', ['slot' => 'Save']);

    expect($html)->toHaveClass('text-halo-primary-foreground');
});

it('ignores extra whitespace between classes', function () {
    expect(halo_merge_classes('flex   items-center'))->toBe('flex items-center');
});

it('reads the whole theme config when no key is given', function () {
    expect(theme())->toBe(config('halo.theme'));
});

it('reads a specific theme config value by key', function () {
    expect(theme('default'))->toBe('halo');
});

it('falls back to a default when a theme key is missing', function () {
    expect(theme('does-not-exist', 'fallback'))->toBe('fallback');
});

it('reads a component default from config', function () {
    expect(halo_default('button', 'variant'))->toBe('primary');
});

it('falls back to a default when a component default is missing', function () {
    expect(halo_default('button', 'does-not-exist', 'fallback'))->toBe('fallback');
});
