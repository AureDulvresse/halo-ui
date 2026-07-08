---
layout: default
title: Radio
permalink: /fr/components/radio/
lang: fr
---

# Radio

`resources/views/components/halo/radio.blade.php`

Rend un `<input type="radio">` natif enveloppé dans un `<label>`.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `id` | `string` ou `null` | auto-généré (aléatoire) | Ne retombe volontairement **pas** sur `name` — les boutons radio d'un même groupe partagent `name`, et le réutiliser comme `id` produirait des ids en double |
| `disabled` | `bool` | `false` | |

Le slot devient le texte de label visible.

## Exemples

```blade
<x-halo::radio name="plan" value="monthly" checked>Mensuel</x-halo::radio>
<x-halo::radio name="plan" value="yearly">Annuel</x-halo::radio>
```
