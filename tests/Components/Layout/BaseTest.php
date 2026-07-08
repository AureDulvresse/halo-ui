<?php

use Illuminate\Support\HtmlString;

it('renders a full HTML document with the default theme and asset tags', function () {
    $html = renderComponent('layout.base', ['slot' => 'Page content']);

    expect($html)
        ->toContain('<!DOCTYPE html>')
        ->toContainAttribute('data-theme', 'halo')
        ->toContain('Page content')
        ->toContain('<link rel="stylesheet"')
        ->toContain('<script src=');
});

it('uses the app name as the default title', function () {
    config(['app.name' => 'Acme Inc.']);

    expect(renderComponent('layout.base', ['slot' => 'x']))->toContain('<title>Acme Inc.</title>');
});

it('accepts a custom title and theme', function () {
    $html = renderComponent('layout.base', ['title' => 'Dashboard', 'theme' => 'eclipse', 'slot' => 'x']);

    expect($html)
        ->toContain('<title>Dashboard</title>')
        ->toContainAttribute('data-theme', 'eclipse');
});

it('renders optional head and scripts slots', function () {
    // A real <x-slot:head> is an Htmlable ComponentSlot, so {{ $head }}
    // doesn't escape it — HtmlString reproduces that here, since a plain
    // string prop would otherwise come through escaped.
    $html = renderComponent('layout.base', ['slot' => 'x'], [
        'head' => new HtmlString('<meta name="description" content="test">'),
        'scripts' => new HtmlString('<script>console.log("hi")</script>'),
    ]);

    expect($html)
        ->toContain('<meta name="description" content="test">')
        ->toContain('console.log("hi")');
});
