<?php

it('renders a nav with the pagination aria-label', function () {
    $html = renderComponent('pagination', ['current' => 1, 'total' => 5, 'baseUrl' => '/users?page=:page']);

    expect($html)->toContainAttribute('aria-label', 'Pagination');
});

it('disables the previous link on the first page', function () {
    $html = renderComponent('pagination', ['current' => 1, 'total' => 5, 'baseUrl' => '/users?page=:page']);

    expect($html)->toContainAttribute('aria-disabled', 'true');
});

it('disables the next link on the last page', function () {
    $html = renderComponent('pagination', ['current' => 5, 'total' => 5, 'baseUrl' => '/users?page=:page']);

    expect(substr_count($html, 'aria-disabled="true"'))->toBe(1);
});

it('marks the current page with aria-current', function () {
    $html = renderComponent('pagination', ['current' => 3, 'total' => 5, 'baseUrl' => '/users?page=:page']);

    expect($html)->toContain('aria-current="page">3<');
});

it('builds page hrefs by replacing :page in the base url', function () {
    $html = renderComponent('pagination', ['current' => 1, 'total' => 3, 'baseUrl' => '/users?page=:page']);

    expect($html)->toContain('href="/users?page=2"');
});

it('collapses distant pages behind an ellipsis', function () {
    $html = renderComponent('pagination', ['current' => 1, 'total' => 10, 'window' => 1, 'baseUrl' => '/users?page=:page']);

    expect($html)->toContain('&hellip;');
});
