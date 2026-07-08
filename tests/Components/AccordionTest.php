<?php

it('wires up the haloAccordion data', function () {
    expect(renderComponent('accordion.index', ['slot' => 'Items']))->toContain('haloAccordion(false)');
});

it('passes the multiple prop through to the Alpine data', function () {
    expect(renderComponent('accordion.index', ['multiple' => true, 'slot' => 'Items']))->toContain('haloAccordion(true)');
});

it('renders an item with a toggle button and a named panel', function () {
    $html = renderComponent('accordion.item', ['title' => 'Question 1', 'name' => 'q1', 'slot' => 'Answer 1']);

    expect($html)
        ->toContain('Question 1')
        ->toContain('Answer 1')
        ->toContain("toggle('q1')")
        ->toContain("isOpen('q1')");
});

it('auto-generates a tracking name when none is given', function () {
    $html = renderComponent('accordion.item', ['title' => 'Question 1', 'slot' => 'Answer 1']);

    expect($html)->toContain("toggle('halo-accordion-item-");
});
