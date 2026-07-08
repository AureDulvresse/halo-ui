---
layout: default
title: Textarea
permalink: /fr/components/textarea/
lang: fr
---

# Textarea

`resources/views/components/halo/textarea.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Défaut config : `halo.defaults.textarea.size` |
| `rows` | `int` | `3` | |
| `resize` | `none`\|`vertical`\|`horizontal`\|`both` | `vertical` | |
| `invalid` | `bool` | `false` | Pose `aria-invalid="true"`. Impliqué par `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` ou `null` | auto-généré | Retombe sur `name`, puis un id aléatoire |
| `error` | `string` ou `null` | `null` | Affiche un message sous le champ, relié via `aria-describedby`, et implique `invalid` |

Tout attribut supplémentaire (`name`, `placeholder`, `wire:model`, ...) passe tel quel sur le `<textarea>`.

## Exemples

```blade
<x-halo::textarea name="bio" rows="5" placeholder="Parle-nous de toi" />
<x-halo::textarea name="notes" resize="none" />
<x-halo::textarea name="notes" error="Les notes ne peuvent pas être vides" />
```
