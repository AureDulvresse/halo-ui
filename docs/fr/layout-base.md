---
layout: default
title: "Layout : Base"
permalink: /fr/layout-base/
lang: fr
---

# Layout : Base

`resources/views/components/halo/layout/base.blade.php`

Un squelette de document HTML complet — de `<!DOCTYPE html>` à `</html>` — déjà câblé avec `@haloStyles`/`@haloScripts`. Le moyen le plus rapide d'avoir une vue Laravel qui rend avec HaloUI : enrobe le contenu de ta page avec ça, rien d'autre à configurer.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `title` | `string` | `config('app.name')` | Rendu dans `<title>` |
| `theme` | `string` | `config('halo.theme.default')` | Rendu comme `<html data-theme="...">` |

Slots nommés : `head` (contenu `<head>` supplémentaire — balises meta, favicon), `scripts` (scripts additionnels en fin de body). Slot par défaut : le corps de la page.

## Exemple

```blade
<x-halo::layout.base title="Dashboard">
    <x-slot:head>
        <meta name="description" content="Tableau de bord du compte">
    </x-slot:head>

    <x-halo::layout.container>
        <x-halo::layout.page-header title="Dashboard" />
        {{-- contenu de la page --}}
    </x-halo::layout.container>
</x-halo::layout.base>
```

## Notes

Si ton application a déjà son propre layout racine (héritant d'un squelette `<html>` partagé, injectant des scripts analytics, etc.), utilise-le à la place et ajoute simplement `@haloStyles`/`@haloScripts` dedans directement — ce composant existe pour le cas courant d'une petite application ou d'une installation neuve qui n'en a pas encore un.
