---
layout: default
title: EmptyState
permalink: /components/empty-state/
---

# EmptyState

`resources/views/components/halo/empty-state.blade.php`

A centered placeholder for a list, table, or page with nothing to show yet.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `icon` | icon name or `null` | `null` | Rendered via `<x-halo::icon>` above the title |
| `title` | `string` | *required* | |
| `description` | `string` or `null` | `null` | |

Named slot `actions` (optional) renders below the description — typically a `<x-halo::button>`.

Any extra attributes (`class`, ...) pass through to the root `<div>`.

## Examples

```blade
<x-halo::empty-state
    icon="search"
    title="No results found"
    description="Try adjusting your filters or search terms."
>
    <x-slot:actions>
        <x-halo::button variant="outline">Clear filters</x-halo::button>
    </x-slot:actions>
</x-halo::empty-state>

<x-halo::empty-state icon="document" title="No documents yet" />
```

## Accessibility

The icon is decorative (`aria-hidden="true"`, set by `<x-halo::icon>` itself); the title carries the actual meaning via a real heading (`<x-halo::heading level="3">`), so screen reader users navigating by heading land on something meaningful rather than an empty landmark.
