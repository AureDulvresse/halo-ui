---
layout: default
title: Label
permalink: /fr/components/label/
lang: fr
---

# Label

`resources/views/components/halo/label.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `required` | `bool` | `false` | Ajoute un `*` marqué `aria-hidden="true"` (décoratif — le vrai caractère obligatoire doit être sur l'attribut `required` du champ) |

Tout attribut supplémentaire (`for`, `class`, ...) passe tel quel sur l'élément `<label>`.

## Exemples

```blade
<x-halo::label for="email" required>Email</x-halo::label>
<x-halo::input id="email" name="email" required />
```

## Accessibilité

C'est l'association `for` avec l'`id` du champ qui relie réellement le label — cliquer sur le label donne le focus au champ, et les lecteurs d'écran l'annoncent. Le marqueur `*` est purement visuel ; mets le véritable état `required` sur le champ lui-même.
