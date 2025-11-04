<?php

it('renders a button component', function () {
    $html = renderComponent('button', ['slot' => 'Click me']);

    expect($html)->toContain('button');
    expect($html)->toContain('Click me');
});

it('applies variant classes correctly', function () {
    $html = renderComponent('button', [
        'variant' => 'primary',
        'slot' => 'Primary Button'
    ]);

    expect($html)->toContain('bg-blue-600');
    expect($html)->toContain('Primary Button');
});

it('applies size classes correctly', function () {
    $html = renderComponent('button', [
        'size' => 'lg',
        'slot' => 'Large Button'
    ]);

    expect($html)->toContain('px-6');
    expect($html)->toContain('py-3');
});

it('renders with icon', function () {
    $html = renderComponent('button', [
        'icon' => 'check',
        'slot' => 'With Icon'
    ]);

    expect($html)->toContain('With Icon');
    // Icon rendering depends on Blade Icons setup
});

it('renders in loading state', function () {
    $html = renderComponent('button', [
        'loading' => true,
        'slot' => 'Loading'
    ]);

    expect($html)->toContain('disabled');
    expect($html)->toContain('animate-spin');
});

it('can be disabled', function () {
    $html = renderComponent('button', [
        'disabled' => true,
        'slot' => 'Disabled'
    ]);

    expect($html)->toContain('disabled');
    expect($html)->toContain('opacity-50');
});

it('accepts custom classes', function () {
    $view = view('halo::components.halo.button', [
        'attributes' => new \Illuminate\View\ComponentAttributeBag(['class' => 'custom-class'])
    ]);

    $html = (string) $view;

    expect($html)->toContain('custom-class');
});

it('has correct button type', function () {
    $html = renderComponent('button', [
        'type' => 'submit',
        'slot' => 'Submit'
    ]);

    expect($html)->toContain('type="submit"');
});
