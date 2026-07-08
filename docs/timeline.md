---
layout: default
title: Timeline
permalink: /components/timeline/
---

# Timeline

`resources/views/components/halo/timeline/{index,item}.blade.php`

A vertical list of dated events, each marked with a dot on a connecting rail — useful for order history, activity feeds, or changelogs.

## Props

`<x-halo::timeline>` takes no props beyond passthrough attributes.

`timeline.item`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `title` | `string` | *required* | Rendered as the item's heading |
| `date` | `string` or `null` | `null` | Rendered as muted text under the title when given |

The default slot is the item's description body.

## Examples

```blade
<x-halo::timeline>
    <x-halo::timeline.item title="Order placed" date="Jan 1, 2026">
        Your order was received and is being processed.
    </x-halo::timeline.item>

    <x-halo::timeline.item title="Shipped" date="Jan 3, 2026">
        Your package left the warehouse.
    </x-halo::timeline.item>

    <x-halo::timeline.item title="Delivered">
        Package delivered to the front desk.
    </x-halo::timeline.item>
</x-halo::timeline>
```

## Accessibility

The wrapper is a native `<ol>` and each item a native `<li>`, so screen readers announce the list and its item count automatically. The dot marker is purely decorative.
