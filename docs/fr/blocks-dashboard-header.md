---
layout: default
title: "Block : En-tête de dashboard"
permalink: /fr/blocks/dashboard-header/
lang: fr
---

# En-tête de dashboard

[Layout: Page Header](/fr/layout-page-header) avec une action principale, suivi d'une rangée de [Card](/fr/components/card) de statistiques — le haut d'une page de dashboard typique.

## Code

```blade
<x-halo::layout.page-header title="Dashboard" description="Vue d'ensemble de l'activité du compte.">
    <x-slot:actions>
        <x-halo::button icon="plus">Nouveau projet</x-halo::button>
    </x-slot:actions>
</x-halo::layout.page-header>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-3 mt-6">
    <x-halo::card>
        <x-halo::card.body>
            <p class="text-xs font-medium uppercase tracking-wide text-halo-foreground/50">Utilisateurs actifs</p>
            <p class="text-2xl font-bold text-halo-foreground">2 431</p>
        </x-halo::card.body>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.body>
            <p class="text-xs font-medium uppercase tracking-wide text-halo-foreground/50">Revenus</p>
            <p class="text-2xl font-bold text-halo-foreground">12 900 €</p>
        </x-halo::card.body>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.body>
            <p class="text-xs font-medium uppercase tracking-wide text-halo-foreground/50">Tickets ouverts</p>
            <p class="text-2xl font-bold text-halo-foreground">18</p>
        </x-halo::card.body>
    </x-halo::card>
</div>
```
