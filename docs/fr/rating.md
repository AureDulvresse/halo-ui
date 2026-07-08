---
layout: default
title: Rating
permalink: /fr/components/rating/
lang: fr
---

# Rating

`resources/views/components/halo/rating.blade.php`

Une rangée de boutons étoiles pour choisir (ou afficher) une note.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `value` | `int` | `0` | Note initiale |
| `max` | `int` | `5` | Nombre d'étoiles |
| `name` | `string` ou `null` | `null` | Si fourni, rend un `<input type="hidden" name="...">` lié à la valeur courante, pour que la note puisse être soumise avec un formulaire |
| `readonly` | `bool` | `false` | Désactive tous les boutons étoile, pour une note en lecture seule |

## Exemples

```blade
<x-halo::rating value="3" />

<form method="POST" action="/reviews">
    @csrf
    <x-halo::rating name="rating" value="0" max="5" />
    <x-halo::button type="submit">Envoyer l'avis</x-halo::button>
</form>

<x-halo::rating value="4" :readonly="true" />
```

## Accessibilité

La racine rend `role="radiogroup"` avec `aria-label="Rating"`, et chaque étoile est un bouton `role="radio"` qui reflète la sélection via `aria-checked`, selon la sémantique de sélection mutuellement exclusive du [pattern WAI-ARIA radio group](https://www.w3.org/WAI/ARIA/apg/patterns/radio/). Survoler prévisualise une valeur visuellement sans changer `aria-checked` ; cliquer la valide.

## Implémentation

Enregistrée comme `Alpine.data('haloRating', (initial, max) => ...)` dans `resources/js/init.js`. Les étoiles sont rendues côté serveur avec une simple boucle `@for` (pas de templating côté client nécessaire puisque `max` est connu au rendu) ; Alpine ne suit que la `value` courante et la prévisualisation `hovered`.
