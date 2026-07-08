---
layout: default
title: Skeleton
permalink: /fr/components/skeleton/
lang: fr
---

# Skeleton

`resources/views/components/halo/skeleton.blade.php`

Un bloc de substitution qui pulse pendant que le vrai contenu se charge.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `variant` | `text`\|`circle`\|`rectangle` | `rectangle` | Défaut config : `halo.defaults.skeleton.variant`. Contrôle la forme : `text` → une fine barre arrondie, `circle` → un cercle parfait (ex. un avatar), `rectangle` → un bloc arrondi générique |

Tout attribut supplémentaire (`class`, `style`, ...) passe tel quel sur le `<div>` racine. Une `class` fournie surcharge les classes propres du composant pour la même famille d'utilitaires Tailwind (voir `halo_merge_classes()`).

## Exemples

```blade
<x-halo::skeleton variant="circle" class="w-12 h-12" />

<div class="space-y-2">
    <x-halo::skeleton variant="text" class="w-3/4" />
    <x-halo::skeleton variant="text" class="w-1/2" />
</div>

<x-halo::skeleton class="h-32 w-full" />
```

## Accessibilité

Rend `role="status"` avec `aria-label="Loading"` afin que les technologies d'assistance annoncent qu'un contenu arrive, sans avoir à lire le balisage de substitution lui-même. L'animation de pulsation est l'utilitaire natif `animate-pulse` de Tailwind.
