---
layout: default
title: Layout: Container
permalink: /layout-container/
---

# Layout: Container

`resources/views/components/halo/layout/container.blade.php`

A max-width, horizontally-centered wrapper with responsive side padding — the standard content-width constraint for a page or section.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg`\|`xl`\|`full` | `lg` | `sm`=`max-w-3xl`, `md`=`max-w-5xl`, `lg`=`max-w-6xl`, `xl`=`max-w-7xl`, `full`=no max width |

## Example

```blade
<x-halo::layout.container size="md">
    <x-halo::layout.page-header title="Settings" />
    {{-- page content --}}
</x-halo::layout.container>
```
