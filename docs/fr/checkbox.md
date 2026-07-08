---
layout: default
title: Checkbox
permalink: /fr/components/checkbox/
lang: fr
---

# Checkbox

`resources/views/components/halo/checkbox.blade.php`

Rend un `<input type="checkbox">` natif enveloppé dans un `<label>`, pour que cliquer sur le texte visible bascule la case — aucun JS requis.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `id` | `string` ou `null` | auto-généré | Retombe sur `name`, puis un id aléatoire |
| `disabled` | `bool` | `false` | |

Le slot devient le texte de label visible. Tout attribut supplémentaire (`name`, `value`, `checked`, `wire:model`, ...) passe tel quel sur l'`<input>`.

## Exemples

```blade
<x-halo::checkbox name="terms" value="accepted">
    J'accepte les conditions d'utilisation
</x-halo::checkbox>
```

## Note d'implémentation

Utilise l'utilitaire natif `accent-halo-primary` (Tailwind v4 génère `accent-*` automatiquement pour toute couleur de thème) plutôt qu'un `appearance-none` + coche SVG fait main — moins de rouages, et la coche native se rend correctement sur tous les navigateurs sans balisage supplémentaire.
