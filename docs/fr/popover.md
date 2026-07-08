---
layout: default
title: Popover
permalink: /fr/components/popover/
lang: fr
---

# Popover

`resources/views/components/halo/popover.blade.php`

Un panneau superposé pour du contenu riche arbitraire — formulaires, aperçus, actions secondaires — déclenché par un clic. Structurellement proche de [Dropdown](../dropdown), mais sans `role="menu"`/navigation clavier flottante, puisque son contenu n'est pas une liste de commandes.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `align` | `left`\|`right` | `left` (défaut config : `halo.defaults.popover.align`) | Alignement du panneau par rapport au déclencheur |

Prend un slot nommé `trigger` et un slot par défaut pour le contenu du panneau.

## Exemples

```blade
<x-halo::popover align="right">
    <x-slot:trigger>
        <x-halo::button variant="outline">Filtres</x-halo::button>
    </x-slot:trigger>

    <div class="space-y-3">
        <x-halo::label for="status">Statut</x-halo::label>
        <x-halo::select id="status" :options="['open' => 'Ouvert', 'closed' => 'Fermé']" />
    </div>
</x-halo::popover>
```

## Accessibilité

`role="dialog"` sur le panneau. L'ouverture déplace le focus vers le premier élément focusable à l'intérieur ; la fermeture (via Échap, un clic extérieur, ou ta propre logique de déclenchement) redonne le focus à ce qui l'a ouvert — la même discipline de retour de focus que Modal et Dropdown, sans piège à focus complet puisqu'un popover peut être fermé en cliquant ailleurs.

## Implémentation

Enregistré comme `Alpine.data('haloPopover', ...)` dans `resources/js/init.js`.
