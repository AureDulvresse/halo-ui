---
layout: default
title: Checkbox
permalink: /components/checkbox/
---

# Checkbox

`resources/views/components/halo/checkbox.blade.php`

Renders a native `<input type="checkbox">` wrapped in a `<label>`, so clicking the visible text toggles the box — no JS required.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `id` | `string` or `null` | auto-generated | Falls back to `name`, then a random id |
| `disabled` | `bool` | `false` | |

The slot becomes the visible label text. Any extra attributes (`name`, `value`, `checked`, `wire:model`, ...) pass through to the `<input>`.

## Examples

```blade
<x-halo::checkbox name="terms" value="accepted">
    I accept the terms of service
</x-halo::checkbox>
```

## Implementation note

Uses the native `accent-halo-primary` utility (Tailwind v4 generates `accent-*` for any theme color automatically) rather than a hand-rolled `appearance-none` + custom SVG checkmark — fewer moving parts, and the native check renders correctly across browsers without extra markup.
