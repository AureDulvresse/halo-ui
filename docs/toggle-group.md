---
layout: default
title: ToggleGroup
permalink: /components/toggle-group/
---

# ToggleGroup

`resources/views/components/halo/toggle-group/{index,item}.blade.php`

## Props

`<x-halo::toggle-group>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `type` | `single`\|`multiple` | `single` | `single` keeps at most one item selected; `multiple` allows any number |
| `value` | `string`\|`array`\|`null` | `null` for `single`, `[]` for `multiple` | Initial selection |

`toggle-group.item`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `value` | `string` | *required* | The value this item represents |

## Examples

```blade
<x-halo::toggle-group type="single" value="center">
    <x-halo::toggle-group.item value="left">Left</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="center">Center</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="right">Right</x-halo::toggle-group.item>
</x-halo::toggle-group>

<x-halo::toggle-group type="multiple" :value="['bold']">
    <x-halo::toggle-group.item value="bold">Bold</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="italic">Italic</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="underline">Underline</x-halo::toggle-group.item>
</x-halo::toggle-group>
```

## Accessibility

The root has `role="group"`. Each item is a real `<button>` with `aria-pressed` reflecting whether its `value` is currently selected, per the WAI-ARIA button pattern — the same approach as [Toggle](../toggle), applied to a connected segmented-control layout.

## Implementation

Registered as `Alpine.data('haloToggleGroup', ...)` in `resources/js/init.js`. `value` is a plain string for `type="single"` (replaced on each `select()`) or an array for `type="multiple"` (membership toggled on each `select()`). `isSelected(v)` checks either the equality or array membership depending on `type`.
