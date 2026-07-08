---
layout: default
title: Switch
permalink: /fr/components/switch/
lang: fr
---

# Switch

`resources/views/components/halo/switch.blade.php`

Un bascule pour un réglage booléen — le même rôle que Checkbox, mais la forme piste/curseur communique "activé/désactivé" plutôt qu'"élément coché dans une liste", ce qu'attendent la plupart des interfaces de réglages/préférences.

Pas de JavaScript — un `<input type="checkbox" role="switch">` natif stylé avec `peer`/`peer-checked` et un pseudo-élément `after:` pour le curseur (le curseur n'a donc besoin que d'être un sibling de l'input, pas un élément imbriqué basculé séparément).

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `id` | `string` ou `null` | auto-généré (ou l'attribut `name`) | Partagé entre le `<label for>` et l'input |
| `disabled` | `bool` | `false` | Assombrit aussi visuellement le label |

Tout attribut supplémentaire (ex. `name`, `:checked`, `wire:model`) passe tel quel sur l'`<input>`. Le slot, s'il n'est pas vide, devient le texte de label visible.

## Exemples

```blade
<x-halo::switch name="notifications">Notifications par email</x-halo::switch>

<x-halo::switch name="beta" checked>Fonctionnalités bêta</x-halo::switch>

<x-halo::switch name="locked" disabled>Réglage verrouillé</x-halo::switch>
```

## Accessibilité

`role="switch"` sur l'input indique aux technologies d'assistance qu'il s'agit d'un bascule à deux états, pas d'un élément de liste à cocher — son état accessible est la propriété native `checked`, comme une checkbox. Le support clavier (Espace pour basculer, Tab pour le focus) est natif, pas simulé.
