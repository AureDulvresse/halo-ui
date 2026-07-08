---
layout: default
title: "Block: Dashboard Header"
permalink: /blocks/dashboard-header/
---

# Dashboard Header

[Layout: Page Header](/layout-page-header) with a primary action, followed by a row of stat [Card](/components/card)s — the top of a typical dashboard page.

## Code

```blade
<x-halo::layout.page-header title="Dashboard" description="Overview of your account activity.">
    <x-slot:actions>
        <x-halo::button icon="plus">New project</x-halo::button>
    </x-slot:actions>
</x-halo::layout.page-header>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-3 mt-6">
    <x-halo::card>
        <x-halo::card.body>
            <p class="text-xs font-medium uppercase tracking-wide text-halo-foreground/50">Active users</p>
            <p class="text-2xl font-bold text-halo-foreground">2,431</p>
        </x-halo::card.body>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.body>
            <p class="text-xs font-medium uppercase tracking-wide text-halo-foreground/50">Revenue</p>
            <p class="text-2xl font-bold text-halo-foreground">$12,900</p>
        </x-halo::card.body>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.body>
            <p class="text-xs font-medium uppercase tracking-wide text-halo-foreground/50">Open tickets</p>
            <p class="text-2xl font-bold text-halo-foreground">18</p>
        </x-halo::card.body>
    </x-halo::card>
</div>
```
