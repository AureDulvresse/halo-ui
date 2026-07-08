---
layout: default
title: Tooltip
permalink: /components/tooltip/
---

# Tooltip

`resources/views/components/halo/tooltip.blade.php`

A short text hint shown on hover or keyboard focus of its trigger. For interactive content (forms, buttons, links inside the panel) use [Popover](popover) instead — a tooltip is announced text, not a focusable region.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `position` | `top`\|`bottom`\|`left`\|`right` | `top` (config default: `halo.defaults.tooltip.position`) | Panel position relative to the trigger |

Takes a `trigger` named slot and a default slot for the tooltip text.

## Examples

```blade
<x-halo::tooltip position="bottom">
    <x-slot:trigger>
        <x-halo::button variant="ghost" icon="information-circle" />
    </x-slot:trigger>

    Synced 2 minutes ago
</x-halo::tooltip>
```

## Accessibility

Shown on `mouseenter`/`focusin` of the wrapper, hidden on `mouseleave`/`focusout` — so it's reachable by keyboard, not just the mouse, per the [WAI-ARIA tooltip pattern](https://www.w3.org/WAI/ARIA/apg/patterns/tooltip/). On mount, `aria-describedby` is set on the trigger's first element automatically, so assistive tech announces the tooltip text alongside the trigger's own label.

## Implementation

Registered as `Alpine.data('haloTooltip', ...)` in `resources/js/init.js`. No dismiss key or focus trap — a tooltip isn't interactive, so it never needs to keep focus.
