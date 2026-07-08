---
layout: default
title: HaloUI
permalink: /fr/
lang: fr
---

# HaloUI

**Bibliothèque de composants UI Blade, moderne et composable, pour Laravel.** Élégante comme shadcn/ui, native comme Blade. Construite avec Tailwind CSS v4, Alpine.js et Blade Icons.

40 composants répartis en Typographie, Layouts, Formulaires, Affichage, Retour utilisateur (Feedback), Superpositions (Overlays) et Navigation — plus 5 thèmes, tous de vraies propriétés CSS personnalisées, pas un thème de façade qui ne change jamais rien au rendu.

## Pour commencer

- [Installation](/fr/installation) — `composer require`, puis deux balises dans ton layout
- [Thèmes](/fr/theming) — comment fonctionnent les tokens `--halo-*` et comment ajouter un thème
- [Composants](#composants) — référence complète des props par composant, listés ci-dessous

## Fonctionnalités

- **Assets zéro-configuration** — `@haloStyles`/`@haloScripts` servent le CSS/JS déjà compilé du package (Alpine.js inclus), sans `vendor:publish`, sans config Vite
- **Composants Blade anonymes** — aucune classe PHP, juste `@props()` et un fichier Blade
- **Vrai thème au runtime** — couleurs, radius, et clair/sombre sont des propriétés CSS personnalisées mappées vers Tailwind v4 via `@theme`
- **Copy-and-own** — fonctionne dès `composer require` ; `php artisan halo:install` est une éjection optionnelle pour une personnalisation totale
- **Accessible par défaut** — attributs ARIA et comportement clavier dès la première version de chaque composant

## Composants

Voir les sections **Composants** et **Layouts** dans la navigation ci-dessus pour la liste complète, ou parcourir le [code source sur GitHub](https://github.com/AureDulvresse/halo-ui/tree/main/resources/views/components/halo).

## Source

[github.com/AureDulvresse/halo-ui](https://github.com/AureDulvresse/halo-ui)
