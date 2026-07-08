---
layout: default
title: Skeleton
permalink: /components/skeleton/
---

# Skeleton

`resources/views/components/halo/skeleton.blade.php`

A placeholder block that pulses while real content is loading.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `variant` | `text`\|`circle`\|`rectangle` | `rectangle` | Config default: `halo.defaults.skeleton.variant`. Controls shape: `text` → a thin rounded bar, `circle` → a perfect circle (e.g. an avatar placeholder), `rectangle` → a generic rounded block |

Any extra attributes (`class`, `style`, ...) pass through to the root `<div>`. A passed `class` overrides the component's own classes for the same Tailwind utility family (see `halo_merge_classes()`).

## Examples

```blade
<x-halo::skeleton variant="circle" class="w-12 h-12" />

<div class="space-y-2">
    <x-halo::skeleton variant="text" class="w-3/4" />
    <x-halo::skeleton variant="text" class="w-1/2" />
</div>

<x-halo::skeleton class="h-32 w-full" />
```

## Accessibility

Renders `role="status"` with `aria-label="Loading"` so assistive tech announces that content is on its way, without needing to read the placeholder markup itself. The pulsing animation is Tailwind's built-in `animate-pulse` utility.
