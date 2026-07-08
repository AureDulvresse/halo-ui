---
layout: default
title: ScrollArea
permalink: /fr/components/scroll-area/
lang: fr
---

# ScrollArea

`resources/views/components/halo/scroll-area.blade.php`

Un conteneur défilant avec une barre de défilement stylisée (fine, avec les tokens `-halo-`) au lieu de celle par défaut du navigateur. Pas de JavaScript.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `height` | `string` ou `null` | `null` | Si fourni, appliqué comme `max-height` en ligne (ex. `20rem`). Si omis, la zone ne défile que lorsque son contenu déborde d'un parent `max-h-full` |

## Exemples

```blade
<x-halo::scroll-area height="20rem">
    <ul class="space-y-2 p-4">
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</x-halo::scroll-area>
```

## Accessibilité

Purement une affordance visuelle/de défilement — elle ne change ni la sémantique ni l'ordre de focus de son contenu. Les utilisateurs au clavier peuvent toujours faire défiler la zone nativement via les flèches/Page Haut/Page Bas une fois qu'elle-même ou un enfant focusable à l'intérieur a le focus.
