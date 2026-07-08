---
layout: default
title: Installation
permalink: /fr/installation/
lang: fr
---

# Installation

## Prérequis

- PHP 8.2+
- Laravel 11+ ou 12+

Tailwind et Alpine.js **ne sont pas** des prérequis séparés — HaloUI embarque son propre CSS/JS déjà compilé (Alpine.js est inclus dans le build JS), donc rien de plus à installer pour la voie rapide ci-dessous.

## Installer via Composer

```bash
composer require ironflow/halo-ui
```

## Voie la plus rapide : deux balises dans ton layout

Pas de `vendor:publish`, pas de config Vite, pas d'installation séparée d'Alpine.js. `@haloStyles`/`@haloScripts` servent directement les assets du package :

```html
<!DOCTYPE html>
<html lang="fr" data-theme="{{ config('halo.theme.default') }}">
<head>
    <meta charset="UTF-8">
    @haloStyles
</head>
<body>
    {{ $slot }}

    @haloScripts
</body>
</html>
```

C'est toute la configuration. `<x-halo::button>`, `<x-halo::input>`, `<x-halo::badge>`, le changement de thème, les pièges à focus, les menus à navigation clavier — tout fonctionne, sans aucune étape de build de ton côté.

## Voie intégrée : ton propre pipeline Vite/Tailwind

Si ton application fait déjà tourner Tailwind v4 et Alpine.js et que tu veux que les classes de HaloUI soient purgeables/tree-shakeable avec les tiennes, saute `@haloStyles`/`@haloScripts` et branche les sources du package dans ton propre build :

```css
/* resources/css/app.css */
@import "tailwindcss";
@import "../../vendor/ironflow/halo-ui/resources/css/theme.css";
@source "../../vendor/ironflow/halo-ui/resources/views";
```

```js
// resources/js/app.js
import Alpine from 'alpinejs';
import '../../vendor/ironflow/halo-ui/resources/js/init.js'; // enregistre haloModal, haloDropdown, etc.

window.Alpine = Alpine;
Alpine.start();
```

Mets `'assets' => ['serve' => false]` dans `config/halo.php` (publie-le d'abord avec `php artisan vendor:publish --tag=halo-config`) pour que `@haloStyles`/`@haloScripts`, si tu les utilises encore quelque part, pointent vers tes propres fichiers publiés/compilés plutôt que vers les routes d'assets du package.

## Éjecter et personnaliser (optionnel)

`halo:install` copie les fichiers de composants du package dans ton application, pour que tu puisses les éditer directement :

```bash
# Éjecter tous les composants
php artisan halo:install --all

# Éjecter des composants spécifiques
php artisan halo:install button input

# Écraser les fichiers déjà éjectés
php artisan halo:install --all --force
```

Une fois éjectés dans `resources/views/components/halo/`, ta copie locale prend le dessus — les composants du package continuent de fonctionner pour tout ce que tu n'as pas éjecté.

## Suite

Voir [Thèmes](/fr/theming) pour choisir ou personnaliser un thème, ou parcourir la liste des composants dans la navigation ci-dessus.
