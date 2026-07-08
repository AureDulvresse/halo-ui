---
layout: default
title: NavigationMenu
permalink: /components/navigation-menu/
---

# NavigationMenu

`resources/views/components/halo/navigation-menu/{index,item}.blade.php`

A horizontal top-level navigation bar. `navigation-menu.index` is a pure layout wrapper (a `<nav>` around a `<ul>`); each `navigation-menu.item` is either a plain link or a dropdown-style submenu trigger, depending on whether it's given an `href`.

## Props

`navigation-menu.item`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `href` | `string` or `null` | `null` | If present, renders a plain `<a>` link. If absent, renders a submenu trigger instead |
| `active` | `bool` | `false` | Only used for the link case; adds `aria-current="page"` and active styling |

When `href` is omitted, the item takes a `trigger` named slot (the trigger's label/content) and a default slot (the submenu panel content) — the same "slot-based trigger" pattern as [Popover](../popover), and it reuses `haloPopover()` directly rather than a near-duplicate factory, since the open/close/click-outside/escape/focus-return behavior is identical.

## Examples

```blade
<x-halo::navigation-menu>
    <x-halo::navigation-menu.item href="/" active>Home</x-halo::navigation-menu.item>

    <x-halo::navigation-menu.item>
        <x-slot:trigger>Products</x-slot:trigger>

        <a href="/products/a" role="menuitem" class="block rounded-halo px-3 py-2 text-sm hover:bg-halo-secondary">Product A</a>
        <a href="/products/b" role="menuitem" class="block rounded-halo px-3 py-2 text-sm hover:bg-halo-secondary">Product B</a>
    </x-halo::navigation-menu.item>

    <x-halo::navigation-menu.item href="/contact">Contact</x-halo::navigation-menu.item>
</x-halo::navigation-menu>
```

## Accessibility

The submenu trigger sets `aria-haspopup="true"` and `aria-expanded` reflecting open state, and the panel uses `role="menu"`. The link case uses `aria-current="page"` rather than any visual-only cue for the active item.

## Implementation

The submenu case registers via the existing `Alpine.data('haloPopover', ...)` in `resources/js/init.js` — no new factory needed.
