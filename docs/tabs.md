---
layout: default
title: Tabs
permalink: /components/tabs/
---

# Tabs

`resources/views/components/halo/tabs/{index,list,trigger,panel}.blade.php`

## Props

`<x-halo::tabs>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `default` | `string` or `null` | `null` | The initially active tab key |

`tabs.trigger` and `tabs.panel` both take:

| Prop | Type | Notes |
|---|---|---|
| `tab` | `string` | *required* — must match between a trigger and its panel |

`tabs.list` takes no props beyond pass-through attributes.

## Examples

```blade
<x-halo::tabs default="account">
    <x-halo::tabs.list>
        <x-halo::tabs.trigger tab="account">Account</x-halo::tabs.trigger>
        <x-halo::tabs.trigger tab="password">Password</x-halo::tabs.trigger>
    </x-halo::tabs.list>

    <x-halo::tabs.panel tab="account">
        Account settings go here.
    </x-halo::tabs.panel>

    <x-halo::tabs.panel tab="password">
        Password settings go here.
    </x-halo::tabs.panel>
</x-halo::tabs>
```

## Accessibility

`tabs.list` has `role="tablist"`, each trigger has `role="tab"` with `aria-selected` reflecting the active tab and a roving `tabindex` (only the active trigger is `0`, others are `-1`). Each panel has `role="tabpanel"`. `←`/`→` move focus and activate the adjacent tab (per the [WAI-ARIA tabs pattern](https://www.w3.org/WAI/ARIA/apg/patterns/tabs/)).

## Implementation

Registered as `Alpine.data('haloTabs', ...)` in `resources/js/init.js`. `select()`/`isActive()` track the active tab by its string key; `focusSibling()` queries `[role="tab"]` within the component's root (`$root`, not a named ref, since the list and its triggers are siblings under the same `x-data` scope).
