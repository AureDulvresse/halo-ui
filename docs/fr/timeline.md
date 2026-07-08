---
layout: default
title: Timeline
permalink: /fr/components/timeline/
lang: fr
---

# Timeline

`resources/views/components/halo/timeline/{index,item}.blade.php`

Une liste verticale d'événements datés, chacun marqué par un point sur un rail de connexion — utile pour un historique de commande, un flux d'activité ou un changelog.

## Props

`<x-halo::timeline>` ne prend pas de props hormis les attributs passés tels quels.

`timeline.item` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `title` | `string` | *requis* | Rendu comme titre de l'élément |
| `date` | `string` ou `null` | `null` | Rendu en texte atténué sous le titre si fourni |

Le slot par défaut est le corps descriptif de l'élément.

## Exemples

```blade
<x-halo::timeline>
    <x-halo::timeline.item title="Commande passée" date="1 janv. 2026">
        Votre commande a été reçue et est en cours de traitement.
    </x-halo::timeline.item>

    <x-halo::timeline.item title="Expédiée" date="3 janv. 2026">
        Votre colis a quitté l'entrepôt.
    </x-halo::timeline.item>

    <x-halo::timeline.item title="Livrée">
        Colis livré à l'accueil.
    </x-halo::timeline.item>
</x-halo::timeline>
```

## Accessibilité

Le conteneur est un `<ol>` natif et chaque élément un `<li>` natif, ce qui permet aux lecteurs d'écran d'annoncer automatiquement la liste et son nombre d'éléments. Le point marqueur est purement décoratif.
