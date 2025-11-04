<?php

use Halo\UI\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| Custom expectations for testing Blade components.
|
*/

expect()->extend('toRenderComponent', function (string $component) {
    $view = $this->value;

    expect($view)->toBeInstanceOf(\Illuminate\View\View::class);
    expect((string) $view)->toContain($component);

    return $this;
});

expect()->extend('toHaveClass', function (string $class) {
    $html = (string) $this->value;

    expect($html)->toContain("class=\"");
    expect($html)->toContain($class);

    return $this;
});

expect()->extend('toHaveAttribute', function (string $attribute, ?string $value = null) {
    $html = (string) $this->value;

    if ($value === null) {
        expect($html)->toContain($attribute);
    } else {
        expect($html)->toContain("{$attribute}=\"{$value}\"");
    }

    return $this;
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Test helper functions.
|
*/

function renderComponent(string $component, array $props = []): string
{
    $propsString = collect($props)
        ->map(fn($value, $key) => is_bool($value)
            ? ($value ? ":{$key}=\"true\"" : ":{$key}=\"false\"")
            : ":{$key}=\"'{$value}'\"")
        ->join(' ');

    return (string) view()->make('halo::components.halo.' . $component, $props);
}
