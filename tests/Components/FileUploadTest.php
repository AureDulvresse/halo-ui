<?php

it('renders a native file input behind a styled drop zone', function () {
    $html = renderComponent('file-upload', ['name' => 'document']);

    expect($html)
        ->toContain('type="file"')
        ->toContainAttribute('name', 'document')
        ->toContain('<label');
});

it('appends [] to the input name when multiple is set', function () {
    expect(renderComponent('file-upload', ['name' => 'documents', 'multiple' => true]))
        ->toContainAttribute('name', 'documents[]')
        ->toContainAttribute('multiple');
});

it('sets the accept attribute and shows it as a hint', function () {
    expect(renderComponent('file-upload', ['accept' => '.pdf,.docx']))
        ->toContainAttribute('accept', '.pdf,.docx')
        ->toContain('.pdf,.docx');
});

it('can be disabled', function () {
    expect(renderComponent('file-upload', ['disabled' => true]))->toContainAttribute('disabled');
});

it('wires up drag-and-drop and file removal via Alpine', function () {
    $html = renderComponent('file-upload');

    expect($html)
        ->toContain('haloFileUpload()')
        ->toContain('@drop.prevent="drop($event)"')
        ->toContain('@click="remove(file)"');
});
