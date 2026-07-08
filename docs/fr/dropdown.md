---
layout: default
title: Dropdown
permalink: /fr/components/dropdown/
lang: fr
---

# Dropdown

`resources/views/components/halo/dropdown/{index,item}.blade.php`

## Props

`<x-halo::dropdown>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `align` | `left`\|`right` | `left` | Alignement du panneau par rapport au déclencheur |

Prend un slot nommé `trigger` et un slot par défaut pour le contenu du panneau.

`dropdown.item` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `href` | `string` ou `null` | `null` | Rend un `<a>` si défini, un `<button type="button">` sinon |

## Exemples

```blade
<x-halo::dropdown align="right">
    <x-slot:trigger>
        <x-halo::button variant="outline">Compte</x-halo::button>
    </x-slot:trigger>

    <x-halo::dropdown.item href="/profile">Profil</x-halo::dropdown.item>
    <x-halo::dropdown.item href="/settings">Paramètres</x-halo::dropdown.item>
    <x-halo::dropdown.item>Se déconnecter</x-halo::dropdown.item>
</x-halo::dropdown>
```

## Accessibilité

Le panneau a `role="menu"`, les éléments ont `role="menuitem"`. Ouvrir le menu donne le focus au premier élément ; `↓`/`↑` naviguent entre les éléments (selon le [pattern WAI-ARIA menu](https://www.w3.org/WAI/ARIA/apg/patterns/menu-button/)). Se ferme — et redonne le focus au déclencheur — sur Échap, un clic à l'extérieur, ou la sélection d'un élément.

## Implémentation

Enregistré comme `Alpine.data('haloDropdown', ...)` dans `resources/js/init.js`. Le panneau est référencé via `x-ref="panel"` pour que `menuItems()` puisse interroger les descendants `[role="menuitem"]` pour la logique de focus flottant, sans que `dropdown.item` ait besoin de s'enregistrer nulle part.
