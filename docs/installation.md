---
layout: default
title: Installation
permalink: /installation/
---

# Installation

## Requirements

- PHP 8.2+
- Laravel 11+ or 12+

Tailwind and Alpine.js are **not** separate requirements — HaloUI ships its own built CSS and JS (Alpine.js is bundled inside the JS build), so there's nothing extra to install for the fast path below.

## Install via Composer

```bash
composer require ironflow/halo-ui
```

## Fastest path: two tags in your layout

No `vendor:publish`, no Vite config, no separate Alpine.js install. `@haloStyles`/`@haloScripts` serve the package's own built assets directly:

```html
<!DOCTYPE html>
<html lang="en" data-theme="{{ config('halo.theme.default') }}">
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

That's the whole setup. `<x-halo::button>`, `<x-halo::input>`, `<x-halo::badge>`, theme switching, focus traps, roving-focus menus — all working, with no build step of your own.

## Integrated path: your own Vite/Tailwind pipeline

If your app already runs Tailwind v4 and Alpine.js and you want HaloUI's classes to be purgeable/tree-shakeable alongside your own, skip `@haloStyles`/`@haloScripts` and wire the package's sources into your own build instead:

```css
/* resources/css/app.css */
@import "tailwindcss";
@import "../../vendor/ironflow/halo-ui/resources/css/theme.css";
@source "../../vendor/ironflow/halo-ui/resources/views";
```

```js
// resources/js/app.js
import Alpine from 'alpinejs';
import '../../vendor/ironflow/halo-ui/resources/js/init.js'; // registers haloModal, haloDropdown, etc.

window.Alpine = Alpine;
Alpine.start();
```

Set `'assets' => ['serve' => false]` in `config/halo.php` (publish it first with `php artisan vendor:publish --tag=halo-config`) so `@haloStyles`/`@haloScripts`, if you still use them anywhere, point at your own published/bundled files instead of the package's asset routes.

## Eject and customize (optional)

`halo:install` copies the package's own component files into your app, so you can edit them directly:

```bash
# Eject every component
php artisan halo:install --all

# Eject specific components
php artisan halo:install button input

# Overwrite files already ejected
php artisan halo:install --all --force
```

Once ejected to `resources/views/components/halo/`, your local copy takes precedence — the package's own components still work for anything you didn't eject.

## Next

See [Theming](/theming) to pick or customize a theme, or browse the component list in the navigation above.
