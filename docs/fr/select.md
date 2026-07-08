---
layout: default
title: Select
permalink: /fr/components/select/
lang: fr
---

# Select

`resources/views/components/halo/select.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Défaut config : `halo.defaults.select.size` |
| `options` | `array<value, label>` ou `null` | `null` | Rend des balises `<option>` ; retombe sur le slot si omis |
| `invalid` | `bool` | `false` | Pose `aria-invalid="true"`. Impliqué par `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` ou `null` | auto-généré | Retombe sur `name`, puis un id aléatoire |
| `error` | `string` ou `null` | `null` | Affiche un message sous le champ, relié via `aria-describedby`, et implique `invalid` |

## Exemples

```blade
<x-halo::select name="country" :options="['fr' => 'France', 'us' => 'États-Unis']" />

<x-halo::select name="country">
    <option value="fr">France</option>
    <option value="us">États-Unis</option>
</x-halo::select>

<x-halo::select name="country" error="Choisis un pays" />
```

Le chevron à droite est décoratif (`pointer-events-none`, `aria-hidden`) — le `<select>` natif gère toujours toute l'interaction.
