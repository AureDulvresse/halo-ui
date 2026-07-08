---
layout: default
title: Label
permalink: /components/label/
---

# Label

`resources/views/components/halo/label.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `required` | `bool` | `false` | Appends a `*` marked `aria-hidden="true"` (decorative — the requirement itself belongs on the field's `required` attribute) |

Any extra attributes (`for`, `class`, ...) pass through to the `<label>` element.

## Examples

```blade
<x-halo::label for="email" required>Email</x-halo::label>
<x-halo::input id="email" name="email" required />
```

## Accessibility

Pairing `for` with the field's `id` is what actually associates the label — clicking the label focuses the field, and screen readers announce it. The `*` marker is visual only; put the real `required` state on the input itself.
