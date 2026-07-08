---
layout: default
title: InputGroup
permalink: /components/input-group/
---

# InputGroup

`resources/views/components/halo/input-group.blade.php`

## Props

InputGroup has no declared props — it is a static wrapper that visually joins a field with a leading and/or trailing addon.

| Slot | Notes |
|---|---|
| `$slot` (default) | The actual field, e.g. `<x-halo::input>` |
| `$leading` | Optional addon rendered before the field (text like `$`, or a button) |
| `$trailing` | Optional addon rendered after the field (text like `.com`, or a button) |

Any extra attributes (`class`, ...) pass through to the outer wrapping `<div>`. A passed `class` overrides the component's own classes for the same Tailwind utility family (see `halo_merge_classes()`).

## Examples

```blade
<x-halo::input-group>
    <x-slot:leading>$</x-slot:leading>
    <x-halo::input name="amount" type="number" />
</x-halo::input-group>

<x-halo::input-group>
    <x-halo::input name="domain" placeholder="example" />
    <x-slot:trailing>.com</x-slot:trailing>
</x-halo::input-group>

<x-halo::input-group>
    <x-slot:leading>https://</x-slot:leading>
    <x-halo::input name="url" />
    <x-slot:trailing>
        <x-halo::button variant="ghost" size="sm" icon="copy" />
    </x-slot:trailing>
</x-halo::input-group>
```

## Accessibility

The wrapper applies `focus-within:ring-2 focus-within:ring-halo-ring`, so the whole group visibly highlights when the inner field receives focus, matching the focus style of a standalone [Input](../input). The nested field's own border, ring and radius are stripped via `[&_input]:border-0 [&_input]:ring-0 [&_input]:rounded-none` (and the `select`/`textarea` equivalents) so only the group's outer border is visible — no double-border edge case to work around.
