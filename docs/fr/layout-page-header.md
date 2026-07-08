---
layout: default
title: "Layout : Page Header"
permalink: /fr/layout-page-header/
lang: fr
---

# Layout : Page Header

`resources/views/components/halo/layout/page-header.blade.php`

Une ligne réutilisable titre de page + description + actions — se marie bien avec [Breadcrumb](../components/breadcrumb) au-dessus. Pas de JavaScript.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `title` | `string` ou `null` | `null` | Rendu comme `<h1>` |
| `description` | `string` ou `null` | `null` | Rendu sous le titre, omis entièrement si `null` |

Slot nommé : `actions` — groupe de boutons aligné à droite (en bas sur mobile).

## Exemple

```blade
<x-halo::layout.page-header title="Membres de l'équipe" description="Gère qui a accès à ce projet.">
    <x-slot:actions>
        <x-halo::button variant="outline">Exporter</x-halo::button>
        <x-halo::button icon="plus">Inviter un membre</x-halo::button>
    </x-slot:actions>
</x-halo::layout.page-header>
```
