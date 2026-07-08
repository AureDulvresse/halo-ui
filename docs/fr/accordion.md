---
layout: default
title: Accordion
permalink: /fr/components/accordion/
lang: fr
---

# Accordion

`resources/views/components/halo/accordion/{index,item}.blade.php`

## Props

`<x-halo::accordion>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `multiple` | `bool` | `false` | Autorise plus d'un élément ouvert à la fois ; sinon en ouvrir un ferme les autres |

`accordion.item` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `title` | `string` | *requis* | Rendu dans le bouton de bascule |
| `name` | `string` ou `null` | auto-généré | Clé de suivi de l'état ouvert/fermé — passe-en une explicite si tu dois y faire référence (ex. pour ouvrir un élément par programme) |

## Exemples

```blade
<x-halo::accordion>
    <x-halo::accordion.item title="Qu'est-ce que HaloUI ?">
        Une bibliothèque de composants Blade pour Laravel.
    </x-halo::accordion.item>

    <x-halo::accordion.item title="Est-ce gratuit ?">
        Oui, sous licence MIT.
    </x-halo::accordion.item>
</x-halo::accordion>

<x-halo::accordion multiple>
    {{-- les deux peuvent être ouverts en même temps --}}
    <x-halo::accordion.item name="shipping" title="Livraison">...</x-halo::accordion.item>
    <x-halo::accordion.item name="returns" title="Retours">...</x-halo::accordion.item>
</x-halo::accordion>
```

## Accessibilité

Chaque bouton de bascule a `aria-expanded` reflétant son état ouvert. L'icône chevron pivote de 180° à l'ouverture (un indice visuel, pas en soi une information accessible — c'est `aria-expanded` qui porte ça).

## Implémentation

Enregistré comme `Alpine.data('haloAccordion', ...)` dans `resources/js/init.js`. `openItems` est un tableau de noms d'éléments ; `toggle()` soit y ajoute (si `multiple`), soit le remplace entièrement. Remarque le double-deux-points `<x-halo::icon ::style="...">` dans `accordion/item.blade.php` — un seul deux-points ferait évaluer l'expression comme du PHP immédiatement par Blade (puisque `<x-halo::icon>` est une vraie balise de composant), ce qui échoue car `isOpen()` est une méthode Alpine, pas une fonction PHP. Le double deux-points dit à Blade d'émettre l'attribut littéralement pour qu'Alpine le lie côté client à la place.
