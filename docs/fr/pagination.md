---
layout: default
title: Pagination
permalink: /fr/components/pagination/
lang: fr
---

# Pagination

`resources/views/components/halo/pagination.blade.php`

Un composant « intelligent » et autonome plutôt que composé de slots — il construit lui-même chaque lien de page à partir d'un triplet `current`/`total`/`baseUrl`, sans avoir besoin qu'on lui passe une instance de paginator. Rendu purement côté serveur ; pas de JavaScript.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `current` | `int` | `1` | La page courante (requis en pratique) |
| `total` | `int` | `1` | Le nombre total de pages (requis en pratique) |
| `baseUrl` | `string` | `''` | Modèle d'URL avec un espace réservé `:page`, ex. `/users?page=:page` (requis en pratique) |
| `window` | `int` | `2` | Le nombre de liens de page à afficher de chaque côté de la page courante |

Les pages en dehors de `current ± window` (à l'exception de la première et de la dernière page, toujours affichées) sont regroupées derrière un séparateur `&hellip;`.

## Exemples

```blade
<x-halo::pagination :current="3" :total="12" base-url="/users?page=:page" />

<x-halo::pagination :current="1" :total="5" base-url="/articles?page=:page" :window="1" />
```

## Accessibilité

Le conteneur est un `<nav aria-label="Pagination">` contenant un `<ul>` de liens. Le lien de la page courante porte `aria-current="page"`. Les liens précédent/suivant sont rendus comme des `<span aria-disabled="true">` non interactifs (plutôt que des balises `<a>` désactivées, qui restent focusables et cliquables) lorsqu'il n'y a pas de page précédente/suivante.
