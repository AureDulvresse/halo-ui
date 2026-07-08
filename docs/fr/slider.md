---
layout: default
title: Slider
permalink: /fr/components/slider/
lang: fr
---

# Slider

`resources/views/components/halo/slider.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `min` | `int`\|`float` | `0` | |
| `max` | `int`\|`float` | `100` | |
| `step` | `int`\|`float` | `1` | |
| `value` | `int`\|`float`\|`null` | `null` | Valeur initiale ; retombe sur `min` avec `showValue` |
| `id` | `string`\|`null` | généré à partir de `name`, ou `uniqid()` | Permet à un `<x-halo::label for="...">` de cibler le champ |
| `disabled` | `bool` | `false` | |
| `showValue` | `bool` | `false` | Ajoute un libellé numérique mis à jour en direct, synchronisé via Alpine |

Tout attribut supplémentaire (`class`, `name`, `wire:model`, ...) passe tel quel sur l'élément natif `<input type="range">`. Une `class` fournie surcharge les classes propres du composant pour la même famille d'utilitaires Tailwind (voir `halo_merge_classes()`).

## Exemples

```blade
<x-halo::slider name="volume" min="0" max="100" value="50" />

<x-halo::slider name="brightness" min="0" max="10" step="1" show-value />

<x-halo::slider name="locked" value="30" disabled />
```

## Accessibilité

Le composant rend un `<input type="range">` natif, il hérite donc gratuitement du support clavier natif du navigateur (flèches, Page Haut/Bas, Origine/Fin) et des annonces des lecteurs d'écran. Associez-le toujours à un `<x-halo::label for="...">` (ou à un `id`/`aria-label` explicite) pour que les technologies d'assistance annoncent ce que le curseur contrôle.
