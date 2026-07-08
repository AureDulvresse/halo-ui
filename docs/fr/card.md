---
layout: default
title: Card
permalink: /fr/components/card/
lang: fr
---

# Card

`resources/views/components/halo/card/{index,header,body,footer}.blade.php`

## Props

`<x-halo::card>` (le conteneur) :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `variant` | `default`\|`bordered`\|`elevated` | `default` | Défaut config : `halo.defaults.card.variant` |

`card.header`, `card.body`, `card.footer` n'ont pas de props au-delà des attributs passthrough.

## Exemples

```blade
<x-halo::card variant="elevated">
    <x-halo::card.header>Paramètres du compte</x-halo::card.header>

    <x-halo::card.body>
        <x-halo::input name="name" placeholder="Nom complet" />
    </x-halo::card.body>

    <x-halo::card.footer>
        <x-halo::button variant="primary">Enregistrer</x-halo::button>
    </x-halo::card.footer>
</x-halo::card>
```

`card.header` a une bordure inférieure, `card.footer` a une bordure supérieure — utiliser l'un sans l'autre fonctionne très bien, ils ne dépendent pas l'un de l'autre.
