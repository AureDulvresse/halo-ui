---
layout: default
title: EmptyState
permalink: /fr/components/empty-state/
lang: fr
---

# EmptyState

`resources/views/components/halo/empty-state.blade.php`

Un placeholder centré pour une liste, un tableau ou une page qui n'a rien à afficher pour l'instant.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `icon` | nom d'icône ou `null` | `null` | Rendu via `<x-halo::icon>` au-dessus du titre |
| `title` | `string` | *requis* | |
| `description` | `string` ou `null` | `null` | |

Slot nommé `actions` (optionnel) rendu sous la description — typiquement un `<x-halo::button>`.

Tout attribut supplémentaire (`class`, ...) passe tel quel sur le `<div>` racine.

## Exemples

```blade
<x-halo::empty-state
    icon="search"
    title="Aucun résultat"
    description="Essayez d'ajuster vos filtres ou vos termes de recherche."
>
    <x-slot:actions>
        <x-halo::button variant="outline">Réinitialiser les filtres</x-halo::button>
    </x-slot:actions>
</x-halo::empty-state>

<x-halo::empty-state icon="document" title="Aucun document pour l'instant" />
```

## Accessibilité

L'icône est décorative (`aria-hidden="true"`, posé par `<x-halo::icon>` lui-même) ; le titre porte le sens réel via un vrai titre de section (`<x-halo::heading level="3">`), afin qu'un utilisateur de lecteur d'écran naviguant par titres tombe sur quelque chose de significatif plutôt qu'un landmark vide.
