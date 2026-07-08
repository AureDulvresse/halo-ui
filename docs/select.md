---
layout: default
title: Select
permalink: /components/select/
---

# Select

`resources/views/components/halo/select/{index,item}.blade.php`

A custom-styled trigger button plus a `role="listbox"` panel of `select.item` options — not a native `<select>`. A browser renders a native `<select>`'s option popup itself, and it can't be restyled to match a themed, rounded field (under the Luma theme's pill-shaped inputs, the native popup stayed a plain square system dropdown). A hidden `<input type="hidden">` mirrors the selected value so it still submits with a form.

## Props

`select.index`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.select.size` |
| `options` | `array<value, label>` or `null` | `null` | Renders `select.item` children; falls back to the slot when omitted |
| `value` | `string` or `null` | `null` | Initial selected value. When it matches a key in `options`, the trigger's label is resolved server-side so it's correct on first paint, before Alpine boots |
| `placeholder` | `string` | `"Select..."` | Shown on the trigger when nothing is selected |
| `name` | `string` or `null` | `null` | When given, renders a hidden `<input type="hidden">` bound to the selected value, so it submits with a form |
| `invalid` | `bool` | `false` | Sets `aria-invalid="true"` on the trigger. Implied by `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | Falls back to `name`, then a random id |
| `error` | `string` or `null` | `null` | Renders a message below the field, wired via `aria-describedby`, and implies `invalid` |

`select.item`:

| Prop | Type | Notes |
|---|---|---|
| `value` | `string` | Required. The value this option represents |

## Examples

```blade
<x-halo::select name="country" :options="['fr' => 'France', 'us' => 'United States']" value="fr" />

<x-halo::select name="country" placeholder="Choose a country">
    <x-halo::select.item value="fr">France</x-halo::select.item>
    <x-halo::select.item value="us">United States</x-halo::select.item>
</x-halo::select>

<x-halo::select name="country" error="Pick a country" />
```

## Accessibility

The trigger is a real `<button>` with `aria-haspopup="listbox"` and `aria-expanded` reflecting open state. The panel uses `role="listbox"`, each option `role="option"` with `aria-selected`. Arrow keys move focus between options (WAI-ARIA listbox pattern); Enter or a click selects the focused option; Escape or an outside click closes the panel and returns focus to the trigger.

## Implementation

Registered as `Alpine.data('haloSelect', (initialValue, initialLabel) => ...)` in `resources/js/init.js`.
