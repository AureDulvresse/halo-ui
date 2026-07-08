---
layout: default
title: Stepper
permalink: /fr/components/stepper/
lang: fr
---

# Stepper

`resources/views/components/halo/stepper/{index,step}.blade.php`

Un indicateur de progression horizontal pour un flux multi-étapes (paiement, assistants d'onboarding, ...).

## Props

`stepper.index` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `current` | `int` | `1` | L'étape active, indexée à partir de 1 |

`stepper.step` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `step` | `int` | — | La position de cette étape, indexée à partir de 1 (requis) |
| `title` | `string` | — | Le libellé de l'étape (requis) |
| `last` | `bool` | `false` | Omet la ligne de connexion vers l'étape suivante |

Une étape n'a pas connaissance du nombre total d'étapes, elle ne peut donc pas déduire seule si elle est la dernière — passe `last` explicitement sur le dernier `<x-halo::stepper.step>` pour supprimer son connecteur final.

## Exemples

```blade
<x-halo::stepper :current="2">
    <x-halo::stepper.step :step="1" title="Compte" />
    <x-halo::stepper.step :step="2" title="Livraison" />
    <x-halo::stepper.step :step="3" title="Confirmation" last />
</x-halo::stepper>
```

## Accessibilité

Rendu comme un `<ol>` de `<li>` étapes, reflétant qu'un stepper est une séquence ordonnée. Le numéro d'une étape terminée est remplacé par une icône de coche pour un repérage visuel plus rapide ; le numéro d'étape sous-jacent reste dans le DOM (caché) pour qu'un lecteur d'écran annonce le contenu textuel de l'élément de liste.

## Implémentation

Enregistré comme `Alpine.data('haloStepper', ...)` dans `resources/js/init.js`.
