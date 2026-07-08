---
layout: default
title: Breadcrumb
permalink: /fr/components/breadcrumb/
lang: fr
---

# Breadcrumb

`resources/views/components/halo/breadcrumb/{index,item}.blade.php`

Pas de JavaScript — du balisage purement statique.

## Props

`breadcrumb.item` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `href` | `string` ou `null` | `null` | Rend un lien suivi d'un séparateur `/` |
| `current` | `bool` | `false` | Rend du texte non interactif avec `aria-current="page"` au lieu d'un lien ; pas de séparateur final |

## Exemples

```blade
<x-halo::breadcrumb>
    <x-halo::breadcrumb.item href="/">Accueil</x-halo::breadcrumb.item>
    <x-halo::breadcrumb.item href="/settings">Paramètres</x-halo::breadcrumb.item>
    <x-halo::breadcrumb.item current>Profil</x-halo::breadcrumb.item>
</x-halo::breadcrumb>
```

## Accessibilité

Le conteneur est un `<nav aria-label="Breadcrumb">` contenant un `<ol>` — un fil d'Ariane est une liste d'étapes, pas une phrase. La page courante utilise `aria-current="page"` plutôt qu'un lien, puisqu'elle n'est pas navigable vers elle-même.
