<?php

it('renders a progressbar with min/max/now', function () {
    $html = renderComponent('progress', ['value' => 40, 'max' => 100]);

    expect($html)
        ->toContainAttribute('role', 'progressbar')
        ->toContainAttribute('aria-valuemin', '0')
        ->toContainAttribute('aria-valuemax', '100')
        ->toContainAttribute('aria-valuenow', '40');
});

it('sets the bar width from value/max', function () {
    $html = renderComponent('progress', ['value' => 25, 'max' => 100]);

    expect($html)->toContain('width: 25%');
});

it('omits aria-valuenow and animates when indeterminate', function () {
    $html = renderComponent('progress', ['indeterminate' => true]);

    expect($html)
        ->not->toContain('aria-valuenow')
        ->toHaveClass('animate-halo-progress-indeterminate');
});
