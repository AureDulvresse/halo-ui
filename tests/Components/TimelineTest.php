<?php

it('renders the timeline wrapper as an ordered list', function () {
    $html = renderComponent('timeline.index', ['slot' => 'Items']);

    expect($html)
        ->toContain('<ol')
        ->toHaveClass('border-l')
        ->toHaveClass('border-halo-border')
        ->and($html)->toContain('Items');
});

it('renders a timeline item with a title and description', function () {
    $html = renderComponent('timeline.item', ['title' => 'Order placed', 'slot' => 'Your order was placed.']);

    expect($html)
        ->toContain('<li')
        ->toContain('Order placed')
        ->toContain('Your order was placed.')
        ->toHaveClass('bg-halo-primary');
});

it('renders the date when given', function () {
    $html = renderComponent('timeline.item', ['title' => 'Order placed', 'date' => 'Jan 1, 2026', 'slot' => 'Details']);

    expect($html)->toContain('Jan 1, 2026');
});

it('omits the date element when none is given', function () {
    $html = renderComponent('timeline.item', ['title' => 'Order placed', 'slot' => 'Details']);

    expect($html)->not->toContain('<time');
});
