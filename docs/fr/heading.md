---
layout: default
title: Heading
permalink: /fr/components/heading/
lang: fr
---

# Heading

`resources/views/components/halo/heading.blade.php`

Rend `<h1>`–`<h6>` avec une échelle de taille par défaut assortie, pour que le niveau de titre reste sémantiquement correct (pour le plan du document / les lecteurs d'écran) indépendamment de la taille visuelle voulue.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `level` | `int` (1–6) | `1` | Ramené dans la plage ; détermine à la fois la balise et la taille par défaut |
| `size` | Classes Tailwind de taille de texte ou `null` | `null` | Surcharge la taille par défaut du niveau sans changer la balise |

## Exemples

```blade
<x-halo::heading level="1">Titre de page</x-halo::heading>
<x-halo::heading level="2">Titre de section</x-halo::heading>

{{-- Un <h2> qui doit paraître plus petit que l'échelle h2 par défaut --}}
<x-halo::heading level="2" size="text-base font-semibold">Titre de section compact</x-halo::heading>
```

## Accessibilité

Garde les niveaux de titre séquentiels (ne saute pas de `h1` à `h3`) — c'est ce qui permet aux utilisateurs de lecteurs d'écran de naviguer dans une page via son plan. Utilise `size` quand un titre doit avoir une certaine apparence sans casser cette séquence, plutôt que de choisir un niveau de titre pour sa taille visuelle.
