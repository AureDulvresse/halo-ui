---
layout: default
title: Heading
permalink: /components/heading/
---

# Heading

`resources/views/components/halo/heading.blade.php`

Renders `<h1>`–`<h6>` with a matching default type scale, so heading levels stay semantically correct (for document outline / screen readers) independently of how large they need to look.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `level` | `int` (1–6) | `1` | Clamped into range; determines both the tag and the default size |
| `size` | Tailwind text-size classes or `null` | `null` | Overrides the level's default size without changing the tag |

## Examples

```blade
<x-halo::heading level="1">Page title</x-halo::heading>
<x-halo::heading level="2">Section title</x-halo::heading>

{{-- An <h2> that needs to look smaller than the default h2 scale --}}
<x-halo::heading level="2" size="text-base font-semibold">Compact section title</x-halo::heading>
```

## Accessibility

Keep heading levels sequential (don't skip from `h1` to `h3`) — that's what lets screen reader users navigate a page by its outline. Use `size` when you need a heading to look a certain way without breaking that sequence, instead of picking a heading level for its visual size.
