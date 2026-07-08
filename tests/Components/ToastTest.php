<?php

it('renders a live region backed by the haloToast store', function () {
    $html = renderComponent('toast');

    expect($html)
        ->toContainAttribute('aria-live', 'polite')
        ->toContain('$store.haloToast.items');
});

it('positions itself in the bottom-right by default', function () {
    expect(renderComponent('toast'))->toHaveClass('bottom-4 right-4');
});

it('repositions when given a different position', function () {
    expect(renderComponent('toast', ['position' => 'top-left']))->toHaveClass('top-4 left-4');
});

it('renders a dismiss control wired to the store', function () {
    expect(renderComponent('toast'))->toContain('$store.haloToast.remove(toast.id)');
});
