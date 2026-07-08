---
layout: default
title: "Layout : App Shell"
permalink: /fr/layout-app-shell/
lang: fr
---

# Layout : App Shell

`resources/views/components/halo/layout/app-shell.blade.php`

Le layout de dashboard classique : une sidebar repliable plus une topbar, la sidebar passant hors-canevas (un tiroir coulissant avec overlay) en dessous du breakpoint `lg`, et intégrée au flux flex normal au-dessus.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `sidebarWidth` | Classe de largeur Tailwind | `w-64` | Appliquée à l'`<aside>` |

Slots nommés : `sidebar`, `topbar`. Slot par défaut : le contenu principal.

## Exemple

```blade
<x-halo::layout.app-shell>
    <x-slot:sidebar>
        <nav class="p-4 space-y-1">
            <x-halo::dropdown.item href="/dashboard">Dashboard</x-halo::dropdown.item>
            <x-halo::dropdown.item href="/settings">Paramètres</x-halo::dropdown.item>
        </nav>
    </x-slot:sidebar>

    <x-slot:topbar>
        <span class="font-semibold">Acme Inc.</span>
    </x-slot:topbar>

    <x-halo::layout.page-header title="Dashboard" description="Vue d'ensemble de ton compte." />

    {{-- contenu de la page --}}
</x-halo::layout.app-shell>
```

## Accessibilité

Le bouton de bascule mobile a `aria-label="Toggle sidebar"` et `:aria-expanded` lié à l'état ouvert/fermé de la sidebar. La sidebar elle-même ne piège pas le focus et ne le restaure pas à la fermeture — contrairement à Modal, ce n'est pas une boîte de dialogue modale (le reste de la page reste accessible pendant qu'elle est ouverte), donc un vrai piège à focus serait le mauvais pattern ici, selon le [pattern WAI-ARIA disclosure](https://www.w3.org/WAI/ARIA/apg/patterns/disclosure/).

## Implémentation

L'état ouvert/fermé de la sidebar est un simple `x-data="{ sidebarOpen: false }"` local sur l'élément racine, pas une factory `Alpine.data()` nommée — les slots `sidebar`/`topbar`/par défaut se rendent comme enfants de cet élément, donc tout ce qui est à l'intérieur (un lien de nav, un bouton de bascule personnalisé) peut atteindre `sidebarOpen` directement, sans câblage supplémentaire.
