---
layout: default
title: NavigationMenu
permalink: /fr/components/navigation-menu/
lang: fr
---

# NavigationMenu

`resources/views/components/halo/navigation-menu/{index,item}.blade.php`

Une barre de navigation horizontale de premier niveau. `navigation-menu.index` est un simple conteneur de mise en page (un `<nav>` autour d'un `<ul>`) ; chaque `navigation-menu.item` est soit un lien simple, soit un déclencheur de sous-menu de type dropdown, selon qu'on lui passe ou non un `href`.

## Props

`navigation-menu.item` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `href` | `string` ou `null` | `null` | Si présent, rend un simple lien `<a>`. Si absent, rend un déclencheur de sous-menu |
| `active` | `bool` | `false` | Utilisé uniquement pour le cas lien ; ajoute `aria-current="page"` et un style actif |

Quand `href` est omis, l'élément prend un slot nommé `trigger` (le libellé/contenu du déclencheur) et un slot par défaut (le contenu du panneau du sous-menu) — le même motif de « déclencheur basé sur un slot » que [Popover](../popover), et il réutilise directement `haloPopover()` plutôt qu'une factory quasi identique, puisque le comportement d'ouverture/fermeture/clic extérieur/échap/retour de focus est identique.

## Exemples

```blade
<x-halo::navigation-menu>
    <x-halo::navigation-menu.item href="/" active>Accueil</x-halo::navigation-menu.item>

    <x-halo::navigation-menu.item>
        <x-slot:trigger>Produits</x-slot:trigger>

        <a href="/products/a" role="menuitem" class="block rounded-halo px-3 py-2 text-sm hover:bg-halo-secondary">Produit A</a>
        <a href="/products/b" role="menuitem" class="block rounded-halo px-3 py-2 text-sm hover:bg-halo-secondary">Produit B</a>
    </x-halo::navigation-menu.item>

    <x-halo::navigation-menu.item href="/contact">Contact</x-halo::navigation-menu.item>
</x-halo::navigation-menu>
```

## Accessibilité

Le déclencheur de sous-menu pose `aria-haspopup="true"` et `aria-expanded` reflétant l'état ouvert, et le panneau utilise `role="menu"`. Le cas lien utilise `aria-current="page"` plutôt qu'un simple indice visuel pour l'élément actif.

## Implémentation

Le cas sous-menu s'enregistre via `Alpine.data('haloPopover', ...)`, déjà présent dans `resources/js/init.js` — aucune nouvelle factory n'est nécessaire.
