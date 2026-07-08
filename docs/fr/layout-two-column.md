---
layout: default
title: "Layout : Two Column"
permalink: /fr/layout-two-column/
lang: fr
---

# Layout : Two Column

`resources/views/components/halo/layout/two-column.blade.php`

Une zone de contenu avec une sidebar secondaire — une page de doc avec une table des matières, une page de paramètres avec une nav de sections. Empilé verticalement en dessous de `lg`, côte à côte au-dessus. Pas de JavaScript.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `sidebarPosition` | `left`\|`right` | `left` | |
| `sidebarWidth` | Classe de largeur Tailwind | `lg:w-64` | Appliquée à l'`<aside>` |

Slot nommé : `sidebar`. Slot par défaut : le contenu principal.

## Exemple

```blade
<x-halo::layout.two-column sidebar-position="right">
    <article class="prose">
        {{-- corps de l'article --}}
    </article>

    <x-slot:sidebar>
        <nav class="sticky top-6 space-y-1 text-sm">
            <a href="#intro">Introduction</a>
            <a href="#usage">Utilisation</a>
        </nav>
    </x-slot:sidebar>
</x-halo::layout.two-column>
```
