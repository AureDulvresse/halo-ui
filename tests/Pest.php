<?php

use Halo\UI\Tests\TestCase;
use Illuminate\View\ComponentAttributeBag;

uses(TestCase::class)->in(__DIR__);

expect()->extend('toHaveClass', function (string $class) {
    expect((string) $this->value)->toContain($class);

    return $this;
});

expect()->extend('toContainAttribute', function (string $attribute, ?string $value = null) {
    $html = (string) $this->value;

    expect($html)->toContain($value === null ? $attribute : "{$attribute}=\"{$value}\"");

    return $this;
});

function renderComponent(string $component, array $props = []): string
{
    // Mirror what real component rendering (<x-halo::x>...</x-halo::x>) does
    // automatically: build $attributes from every passed prop before the
    // view's @props() strips out the declared ones, and always provide
    // $slot (even empty) since components reference it unconditionally.
    $slot = $props['slot'] ?? '';
    unset($props['slot']);

    $props['attributes'] = new ComponentAttributeBag($props);
    $props['slot'] = $slot;

    return (string) view("halo::components.halo.{$component}", $props)->render();
}
