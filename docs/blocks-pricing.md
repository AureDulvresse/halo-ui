---
layout: default
title: "Block: Pricing Cards"
permalink: /blocks/pricing/
---

# Pricing Cards

Three [Card](/components/card)s in a responsive grid, a [Badge](/components/badge) marking the recommended plan, and a [Button](/components/button) per plan. Static markup — wire the feature lists and prices to your own billing plans.

## Code

```blade
<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
    <x-halo::card>
        <x-halo::card.header>
            <span class="font-semibold">Starter</span>
        </x-halo::card.header>
        <x-halo::card.body>
            <p class="text-2xl font-bold text-halo-foreground mb-3">$9<span class="text-sm font-normal text-halo-foreground/60">/mo</span></p>
            <ul class="space-y-1 text-sm text-halo-foreground/80">
                <li>&check; 1 project</li>
                <li>&check; Community support</li>
            </ul>
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button variant="outline" class="w-full">Choose plan</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.header>
            <div class="flex items-center justify-between">
                <span class="font-semibold">Pro</span>
                <x-halo::badge variant="primary">Popular</x-halo::badge>
            </div>
        </x-halo::card.header>
        <x-halo::card.body>
            <p class="text-2xl font-bold text-halo-foreground mb-3">$29<span class="text-sm font-normal text-halo-foreground/60">/mo</span></p>
            <ul class="space-y-1 text-sm text-halo-foreground/80">
                <li>&check; Unlimited projects</li>
                <li>&check; Priority support</li>
                <li>&check; Team seats</li>
            </ul>
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button class="w-full">Choose plan</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>

    <x-halo::card>
        <x-halo::card.header>
            <span class="font-semibold">Enterprise</span>
        </x-halo::card.header>
        <x-halo::card.body>
            <p class="text-2xl font-bold text-halo-foreground mb-3">$99<span class="text-sm font-normal text-halo-foreground/60">/mo</span></p>
            <ul class="space-y-1 text-sm text-halo-foreground/80">
                <li>&check; Everything in Pro</li>
                <li>&check; SSO</li>
                <li>&check; Dedicated support</li>
            </ul>
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button variant="outline" class="w-full">Choose plan</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>
</div>
```
