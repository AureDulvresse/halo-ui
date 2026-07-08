---
layout: default
title: Breadcrumb
permalink: /components/breadcrumb/
---

# Breadcrumb

`resources/views/components/halo/breadcrumb/{index,item}.blade.php`

No JavaScript — purely static markup.

## Props

`breadcrumb.item`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `href` | `string` or `null` | `null` | Renders a link followed by a `/` separator |
| `current` | `bool` | `false` | Renders as non-interactive text with `aria-current="page"` instead of a link; no trailing separator |

## Examples

```blade
<x-halo::breadcrumb>
    <x-halo::breadcrumb.item href="/">Home</x-halo::breadcrumb.item>
    <x-halo::breadcrumb.item href="/settings">Settings</x-halo::breadcrumb.item>
    <x-halo::breadcrumb.item current>Profile</x-halo::breadcrumb.item>
</x-halo::breadcrumb>
```

## Accessibility

The wrapper is a `<nav aria-label="Breadcrumb">` containing an `<ol>` — breadcrumbs are a list of steps, not a sentence. The current page uses `aria-current="page"` rather than a link, since it isn't navigable to itself.
