<?php

it('renders nothing without a name', function () {
    expect(renderComponent('icon'))->toBe('');
});

it('renders the resolved blade-icons svg', function () {
    $html = renderComponent('icon', ['name' => 'check']);

    expect($html)->toContain('<svg');
});

it('applies the correct size class', function () {
    $html = renderComponent('icon', ['name' => 'check', 'size' => 'lg']);

    expect($html)->toHaveClass('w-6 h-6');
});

it('does not recurse infinitely when resolving an icon', function () {
    // Regression guard: an earlier implementation computed the dynamic
    // component name from the icon *set* instead of the icon *name*,
    // causing it to resolve back to itself and crash with an OOM.
    $html = renderComponent('icon', ['name' => 'check']);

    expect($html)->not->toBe('');
});

it('resolves every icon shipped in resources/icons/halo', function (string $icon) {
    expect(renderComponent('icon', ['name' => $icon]))->toContain('<svg');
})->with(function () {
    $path = __DIR__.'/../../resources/icons/halo';

    foreach (glob("{$path}/*.svg") as $file) {
        yield basename($file, '.svg');
    }
});
