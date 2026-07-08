---
layout: default
title: Card
permalink: /components/card/
---

# Card

`resources/views/components/halo/card/{index,header,body,footer}.blade.php`

## Props

`<x-halo::card>` (the container):

| Prop | Type | Default | Notes |
|---|---|---|---|
| `variant` | `default`\|`bordered`\|`elevated` | `default` | Config default: `halo.defaults.card.variant` |

`card.header`, `card.body`, `card.footer` take no props beyond pass-through attributes.

## Examples

```blade
<x-halo::card variant="elevated">
    <x-halo::card.header>Account settings</x-halo::card.header>

    <x-halo::card.body>
        <x-halo::input name="name" placeholder="Full name" />
    </x-halo::card.body>

    <x-halo::card.footer>
        <x-halo::button variant="primary">Save</x-halo::button>
    </x-halo::card.footer>
</x-halo::card>
```

`card.header` has a bottom border, `card.footer` has a top border — using either alone (without the other) is fine, they don't depend on each other.
