---
layout: default
title: "Layout : Container"
permalink: /fr/layout-container/
lang: fr
---

# Layout : Container

`resources/views/components/halo/layout/container.blade.php`

Un conteneur centré horizontalement, à largeur maximale, avec un padding latéral responsive — la contrainte de largeur standard pour une page ou une section.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg`\|`xl`\|`full` | `lg` | `sm`=`max-w-3xl`, `md`=`max-w-5xl`, `lg`=`max-w-6xl`, `xl`=`max-w-7xl`, `full`=pas de largeur max |

## Exemple

```blade
<x-halo::layout.container size="md">
    <x-halo::layout.page-header title="Paramètres" />
    {{-- contenu de la page --}}
</x-halo::layout.container>
```
