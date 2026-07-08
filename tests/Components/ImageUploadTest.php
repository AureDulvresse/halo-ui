<?php

it('renders a native file input restricted to images', function () {
    $html = renderComponent('image-upload', ['name' => 'avatar']);

    expect($html)
        ->toContain('type="file"')
        ->toContainAttribute('name', 'avatar')
        ->toContainAttribute('accept', 'image/*');
});

it('appends [] to the input name when multiple is set', function () {
    expect(renderComponent('image-upload', ['name' => 'gallery', 'multiple' => true]))
        ->toContainAttribute('name', 'gallery[]')
        ->toContainAttribute('multiple');
});

it('can be disabled', function () {
    expect(renderComponent('image-upload', ['disabled' => true]))->toContainAttribute('disabled');
});

it('wires up drag-and-drop, preview rendering, and removal via Alpine', function () {
    $html = renderComponent('image-upload');

    expect($html)
        ->toContain('haloImageUpload()')
        ->toContain('@drop.prevent="drop($event)"')
        ->toContain(':src="file.preview"')
        ->toContain('@click="remove(file)"');
});
