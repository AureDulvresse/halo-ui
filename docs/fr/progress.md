---
layout: default
title: Progress
permalink: /fr/components/progress/
lang: fr
---

# Progress

`resources/views/components/halo/progress.blade.php`

Une barre de progression déterminée ou indéterminée. Pas de JavaScript pour le cas déterminé — la largeur de la barre est un simple `style` inline ; `indeterminate` bascule sur une animation CSS par keyframes (`resources/css/halo.css`).

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `value` | `int`\|`float` | `0` | Ignoré si `indeterminate` |
| `max` | `int`\|`float` | `100` | |
| `indeterminate` | `bool` | `false` | Balaie une barre de largeur fixe au lieu de refléter `value`/`max` |

## Exemples

```blade
<x-halo::progress value="40" />

<x-halo::progress value="{{ $uploaded }}" max="{{ $total }}" />

<x-halo::progress indeterminate />
```

## Accessibilité

`role="progressbar"` avec `aria-valuemin`/`aria-valuemax` toujours posés ; `aria-valuenow` est posé pour le cas déterminé et volontairement omis en mode `indeterminate` — une opération indéterminée n'a pas de "valeur actuelle" pertinente à annoncer.

Le balayage indéterminé respecte `prefers-reduced-motion: reduce` (ralenti à un cycle de 3s plutôt que désactivé purement — une barre "indéterminée" statique se lit comme bloquée, pas comme en cours).
