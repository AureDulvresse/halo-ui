---
layout: default
title: ToggleGroup
permalink: /fr/components/toggle-group/
lang: fr
---

# ToggleGroup

`resources/views/components/halo/toggle-group/{index,item}.blade.php`

## Props

`<x-halo::toggle-group>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `type` | `single`\|`multiple` | `single` | `single` garde au plus un élément sélectionné ; `multiple` en autorise plusieurs |
| `value` | `string`\|`array`\|`null` | `null` pour `single`, `[]` pour `multiple` | Sélection initiale |

`toggle-group.item` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `value` | `string` | *requis* | La valeur représentée par cet élément |

## Exemples

```blade
<x-halo::toggle-group type="single" value="center">
    <x-halo::toggle-group.item value="left">Gauche</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="center">Centre</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="right">Droite</x-halo::toggle-group.item>
</x-halo::toggle-group>

<x-halo::toggle-group type="multiple" :value="['bold']">
    <x-halo::toggle-group.item value="bold">Gras</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="italic">Italique</x-halo::toggle-group.item>
    <x-halo::toggle-group.item value="underline">Souligné</x-halo::toggle-group.item>
</x-halo::toggle-group>
```

## Accessibilité

La racine porte `role="group"`. Chaque élément est un vrai `<button>` avec `aria-pressed` reflétant si sa `value` est sélectionnée, selon le pattern WAI-ARIA du bouton — la même approche que [Toggle](../toggle), appliquée à une disposition connectée en contrôle segmenté.

## Implémentation

Enregistré comme `Alpine.data('haloToggleGroup', ...)` dans `resources/js/init.js`. `value` est une simple chaîne pour `type="single"` (remplacée à chaque `select()`) ou un tableau pour `type="multiple"` (appartenance basculée à chaque `select()`). `isSelected(v)` teste soit l'égalité, soit l'appartenance au tableau, selon `type`.
