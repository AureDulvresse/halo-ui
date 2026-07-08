---
layout: default
title: Tabs
permalink: /fr/components/tabs/
lang: fr
---

# Tabs

`resources/views/components/halo/tabs/{index,list,trigger,panel}.blade.php`

## Props

`<x-halo::tabs>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `default` | `string` ou `null` | `null` | La clé de l'onglet actif au départ |

`tabs.trigger` et `tabs.panel` prennent tous les deux :

| Prop | Type | Notes |
|---|---|---|
| `tab` | `string` | *requis* — doit correspondre entre un trigger et son panel |

`tabs.list` n'a pas de props au-delà des attributs passthrough.

## Exemples

```blade
<x-halo::tabs default="account">
    <x-halo::tabs.list>
        <x-halo::tabs.trigger tab="account">Compte</x-halo::tabs.trigger>
        <x-halo::tabs.trigger tab="password">Mot de passe</x-halo::tabs.trigger>
    </x-halo::tabs.list>

    <x-halo::tabs.panel tab="account">
        Paramètres du compte ici.
    </x-halo::tabs.panel>

    <x-halo::tabs.panel tab="password">
        Paramètres de mot de passe ici.
    </x-halo::tabs.panel>
</x-halo::tabs>
```

## Accessibilité

`tabs.list` a `role="tablist"`, chaque trigger a `role="tab"` avec `aria-selected` reflétant l'onglet actif et un `tabindex` flottant (seul le trigger actif a `0`, les autres `-1`). Chaque panel a `role="tabpanel"`. `←`/`→` déplacent le focus et activent l'onglet adjacent (selon le [pattern WAI-ARIA tabs](https://www.w3.org/WAI/ARIA/apg/patterns/tabs/)).

## Implémentation

Enregistré comme `Alpine.data('haloTabs', ...)` dans `resources/js/init.js`. `select()`/`isActive()` suivent l'onglet actif par sa clé texte ; `focusSibling()` interroge `[role="tab"]` dans la racine du composant (`$root`, pas une référence nommée, puisque la liste et ses triggers sont siblings sous le même scope `x-data`).
