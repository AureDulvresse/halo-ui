---
layout: default
title: Layout: App Shell
permalink: /layout-app-shell/
---

# Layout: App Shell

`resources/views/components/halo/layout/app-shell.blade.php`

The classic dashboard layout: a collapsible sidebar plus a topbar, with the sidebar off-canvas (a slide-in drawer with an overlay) below the `lg` breakpoint and part of the normal flex flow above it.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `sidebarWidth` | Tailwind width class | `w-64` | Applied to the `<aside>` |

Named slots: `sidebar`, `topbar`. Default slot: main content.

## Example

```blade
<x-halo::layout.app-shell>
    <x-slot:sidebar>
        <nav class="p-4 space-y-1">
            <x-halo::dropdown.item href="/dashboard">Dashboard</x-halo::dropdown.item>
            <x-halo::dropdown.item href="/settings">Settings</x-halo::dropdown.item>
        </nav>
    </x-slot:sidebar>

    <x-slot:topbar>
        <span class="font-semibold">Acme Inc.</span>
    </x-slot:topbar>

    <x-halo::layout.page-header title="Dashboard" description="Overview of your account." />

    {{-- page content --}}
</x-halo::layout.app-shell>
```

## Accessibility

The mobile toggle button has `aria-label="Toggle sidebar"` and `:aria-expanded` bound to the sidebar's open state. The sidebar itself doesn't trap focus or restore it on close — unlike Modal, it's not a modal dialog (the rest of the page stays reachable while it's open), so a full focus trap would be the wrong pattern here per the [WAI-ARIA disclosure pattern](https://www.w3.org/WAI/ARIA/apg/patterns/disclosure/).

## Implementation

Sidebar open/closed state is plain local `x-data="{ sidebarOpen: false }"` on the root element, not a named `Alpine.data()` factory — the `sidebar`/`topbar`/default slots render as children of that element, so anything inside (a nav link, a custom toggle button) can reach `sidebarOpen` directly without any wiring.
