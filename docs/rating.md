---
layout: default
title: Rating
permalink: /components/rating/
---

# Rating

`resources/views/components/halo/rating.blade.php`

A row of star buttons for picking (or displaying) a rating.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `value` | `int` | `0` | Initial rating |
| `max` | `int` | `5` | Number of stars |
| `name` | `string` or `null` | `null` | When given, renders a hidden `<input type="hidden" name="...">` bound to the current value, so the rating can be submitted with a form |
| `readonly` | `bool` | `false` | Disables all star buttons, for display-only ratings |

## Examples

```blade
<x-halo::rating value="3" />

<form method="POST" action="/reviews">
    @csrf
    <x-halo::rating name="rating" value="0" max="5" />
    <x-halo::button type="submit">Submit review</x-halo::button>
</form>

<x-halo::rating value="4" :readonly="true" />
```

## Accessibility

The root renders `role="radiogroup"` with `aria-label="Rating"`, and each star is a `role="radio"` button reflecting selection via `aria-checked`, per the mutually-exclusive selection semantics of the [WAI-ARIA radio group pattern](https://www.w3.org/WAI/ARIA/apg/patterns/radio/). Hovering previews a value visually without changing `aria-checked`; clicking commits.

## Implementation

Registered as `Alpine.data('haloRating', (initial, max) => ...)` in `resources/js/init.js`. Stars are rendered server-side with a plain `@for` loop (no client-side templating needed since `max` is known at render time); Alpine only tracks the current `value` and the `hovered` preview.
