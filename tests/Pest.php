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

function renderComponent(string $component, array $props = [], array $slots = []): string
{
    // Mirror what real component rendering (<x-halo::x>...</x-halo::x>) does
    // automatically: build $attributes from every passed prop before the
    // view's @props() strips out the declared ones, and always provide
    // $slot (even empty) since components reference it unconditionally.
    //
    // Named slots (a `trigger`/`sidebar`/`actions`/... slot, as opposed to
    // an HTML attribute) MUST go through $slots, not $props. Real Blade
    // never puts <x-slot:x> content into $attributes — only the tag's own
    // attributes land there. Putting a slot's value into both $attributes
    // *and* as a bare view variable (which @props() needs for the "$x ?? ''"
    // pattern components use for optional slots) trips a real compiled
    // @props() behavior: it unsets any bare variable whose name collides
    // with a leftover (undeclared) $attributes key, so the slot content
    // would silently disappear even though `{{ $trigger }}` reads $trigger.
    $slot = $props['slot'] ?? '';
    unset($props['slot']);

    $props['attributes'] = new ComponentAttributeBag($props);
    $props['slot'] = $slot;

    foreach ($slots as $name => $content) {
        $props[$name] = $content;
    }

    return (string) view("halo::components.halo.{$component}", $props)->render();
}
