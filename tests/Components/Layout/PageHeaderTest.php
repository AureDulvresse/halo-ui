<?php

it('renders a title and description', function () {
    $html = renderComponent('layout.page-header', [
        'title' => 'Team members',
        'description' => 'Manage who has access to this project.',
    ]);

    expect($html)
        ->toContain('Team members')
        ->toContain('Manage who has access to this project.');
});

it('omits the description when none is given', function () {
    expect(renderComponent('layout.page-header', ['title' => 'Team members']))
        ->not->toContain('<p class="mt-1');
});

it('renders an actions slot aligned to the end', function () {
    $html = renderComponent('layout.page-header', ['title' => 'x'], ['actions' => 'Invite button']);

    expect($html)->toContain('Invite button');
});
