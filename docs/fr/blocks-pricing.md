---
layout: default
title: "Block : Grille tarifaire"
permalink: /fr/blocks/pricing/
lang: fr
---

# Grille tarifaire

Trois [Card](/fr/components/card) dans une grille responsive, un [Badge](/fr/components/badge) marquant le plan recommandé, et un [Button](/fr/components/button) par plan. Balisage statique — branche les listes de fonctionnalités et les prix sur tes propres plans de facturation.

## Code

```blade
<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
    <x-halo::card>
        <x-halo::card.header>
            <span class="font-semibold">Starter</span>
        </x-halo::card.header>
        <x-halo::card.body>
            <p class="text-2xl font-bold text-halo-foreground mb-3">9€<span class="text-sm font-normal text-halo-foreground/60">/mois</span></p>
            <ul class="space-y-1 text-sm text-halo-foreground/80">
                <li>&check; 1 projet</li>
                <li>&check; Support communautaire</li>
            </ul>
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button variant="outline" class="w-full">Choisir ce plan</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.header>
            <div class="flex items-center justify-between">
                <span class="font-semibold">Pro</span>
                <x-halo::badge variant="primary">Populaire</x-halo::badge>
            </div>
        </x-halo::card.header>
        <x-halo::card.body>
            <p class="text-2xl font-bold text-halo-foreground mb-3">29€<span class="text-sm font-normal text-halo-foreground/60">/mois</span></p>
            <ul class="space-y-1 text-sm text-halo-foreground/80">
                <li>&check; Projets illimités</li>
                <li>&check; Support prioritaire</li>
                <li>&check; Sièges d'équipe</li>
            </ul>
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button class="w-full">Choisir ce plan</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.header>
            <span class="font-semibold">Enterprise</span>
        </x-halo::card.header>
        <x-halo::card.body>
            <p class="text-2xl font-bold text-halo-foreground mb-3">99€<span class="text-sm font-normal text-halo-foreground/60">/mois</span></p>
            <ul class="space-y-1 text-sm text-halo-foreground/80">
                <li>&check; Tout ce qui est dans Pro</li>
                <li>&check; SSO</li>
                <li>&check; Support dédié</li>
            </ul>
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button variant="outline" class="w-full">Choisir ce plan</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>
</div>
```
