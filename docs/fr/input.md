---
layout: default
title: Input
permalink: /fr/components/input/
lang: fr
---

# Input

`resources/views/components/halo/input.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Défaut config : `halo.defaults.input.size` |
| `icon` | nom d'icône ou `null` | `null` | Rendu dans le champ via `<x-halo::icon>` |
| `iconPosition` | `left`\|`right` | `left` | |
| `invalid` | `bool` | `false` | Pose `aria-invalid="true"` et bascule la bordure/le ring vers `--halo-danger`. Impliqué par `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` ou `null` | auto-généré | Retombe sur l'attribut `name`, puis un id aléatoire — toujours présent pour qu'un `<label for>` ait une cible |
| `error` | `string` ou `null` | `null` | Affiche un message sous le champ, relié via `aria-describedby`, et implique `invalid` |

Tout attribut supplémentaire (`name`, `type`, `placeholder`, `value`, `wire:model`, ...) passe tel quel sur l'élément `<input>`.

## Exemples

```blade
<label for="email">Email</label>
<x-halo::input id="email" name="email" type="email" icon="mail" placeholder="vous@exemple.com" />

<x-halo::input name="promo" error="Ce code a expiré" value="pas-un-code" />

<x-halo::input name="locked" :disabled="true" value="lecture seule" />
```

## Accessibilité

Le composant ne rend pas son propre `<label>` — associe-le à un vrai `<label for>` pointant vers l'`id` du champ (explicite ou auto-généré). Passer `error` pose automatiquement `aria-invalid="true"` et `aria-describedby` sur le champ, et affiche le message dans un `<p>` avec un `id` correspondant — aucun câblage manuel nécessaire. Utilise `invalid` seul quand tu veux juste l'état visuel (ex. validation en direct avant qu'un message soit prêt).
