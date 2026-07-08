---
layout: default
title: Combobox
permalink: /components/combobox/
---

# Combobox

`resources/views/components/halo/combobox/{index,option}.blade.php`

A searchable, filterable select: a text input that filters a server-rendered list of options client-side as you type. Unlike [Select](../select), it has no native `<select>` — the filtering, selection, and (optional) form submission are handled entirely by Alpine, so all options must be rendered up front (no AJAX/dynamic loading).

## Props

`<x-halo::combobox>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `name` | `string` or `null` | `null` | When given, renders a hidden `<input>` with this name holding the selected value, so it submits with a form |
| `placeholder` | `string` | `"Select..."` (config default: `halo.defaults.combobox.placeholder`) | Placeholder on the text input |
| `value` | `string` or `null` | `null` | Initially selected value |

`combobox.option`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `value` | `string` | *required* | The value submitted/selected when this option is chosen |

The default slot of each option is its visible label.

## Examples

```blade
<x-halo::combobox name="country" placeholder="Search a country...">
    <x-halo::combobox.option value="fr">France</x-halo::combobox.option>
    <x-halo::combobox.option value="de">Germany</x-halo::combobox.option>
    <x-halo::combobox.option value="jp">Japan</x-halo::combobox.option>
</x-halo::combobox>

{{-- pre-selected --}}
<x-halo::combobox name="country" value="de">
    <x-halo::combobox.option value="fr">France</x-halo::combobox.option>
    <x-halo::combobox.option value="de">Germany</x-halo::combobox.option>
</x-halo::combobox>
```

## Accessibility

The text input has `role="combobox"`, `aria-autocomplete="list"`, `aria-controls` pointing at the listbox, and a live `aria-expanded`. The panel has `role="listbox"` and each option `role="option"`. Escape closes the panel and a click outside closes it, matching the pattern used by [Popover](../popover) and [Dropdown](../dropdown).

Keyboard support is intentionally minimal in this version: typing filters the list, Enter submits the surrounding form as usual, and Escape closes the panel. Full arrow-key roving focus between options (as `Dropdown` has for its menu items) is not yet implemented — pair this component with mouse/touch selection, or contribute the arrow-key handling if you need it.

## Implementation

Registered as `Alpine.data('haloCombobox', ...)` in `resources/js/init.js`. `matches(text, query)` is a case-insensitive substring check used by each option's `x-show`; `select(value, label)` sets the hidden input's value and the visible label, then closes the panel.
