---
layout: default
title: Slider
permalink: /components/slider/
---

# Slider

`resources/views/components/halo/slider.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `min` | `int`\|`float` | `0` | |
| `max` | `int`\|`float` | `100` | |
| `step` | `int`\|`float` | `1` | |
| `value` | `int`\|`float`\|`null` | `null` | Initial value; falls back to `min` when `showValue` is used |
| `id` | `string`\|`null` | auto-generated from `name`, or `uniqid()` | Lets a `<x-halo::label for="...">` target the input |
| `disabled` | `bool` | `false` | |
| `showValue` | `bool` | `false` | Wraps the input in a live-updating numeric label kept in sync via Alpine |

Any extra attributes (`class`, `name`, `wire:model`, ...) pass through to the native `<input type="range">`. A passed `class` overrides the component's own classes for the same Tailwind utility family (see `halo_merge_classes()`).

## Examples

```blade
<x-halo::slider name="volume" min="0" max="100" value="50" />

<x-halo::slider name="brightness" min="0" max="10" step="1" show-value />

<x-halo::slider name="locked" value="30" disabled />
```

## Accessibility

Renders a native `<input type="range">`, so it inherits the browser's built-in keyboard support (arrow keys, Page Up/Down, Home/End) and screen reader announcements for free. Always pair it with a `<x-halo::label for="...">` (or an explicit `id`/`aria-label`) so assistive technology can announce what the slider controls.
