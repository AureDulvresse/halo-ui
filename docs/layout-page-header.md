---
layout: default
title: "Layout: Page Header"
permalink: /layout-page-header/
---

# Layout: Page Header

`resources/views/components/halo/layout/page-header.blade.php`

A reusable page title + description + actions row — pairs well with [Breadcrumb](../components/breadcrumb) above it. No JavaScript.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `title` | `string` or `null` | `null` | Rendered as an `<h1>` |
| `description` | `string` or `null` | `null` | Rendered below the title, omitted entirely when `null` |

Named slot: `actions` — right-aligned (bottom-aligned on mobile) button group.

## Example

```blade
<x-halo::layout.page-header title="Team members" description="Manage who has access to this project.">
    <x-slot:actions>
        <x-halo::button variant="outline">Export</x-halo::button>
        <x-halo::button icon="plus">Invite member</x-halo::button>
    </x-slot:actions>
</x-halo::layout.page-header>
```
