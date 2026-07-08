---
layout: default
title: Button
permalink: /fr/components/button/
lang: fr
---

# Button

`resources/views/components/halo/button.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `variant` | `primary`\|`secondary`\|`outline`\|`ghost`\|`danger` | `primary` | Défaut config : `halo.defaults.button.variant` |
| `size` | `sm`\|`md`\|`lg` | `md` | Défaut config : `halo.defaults.button.size` |
| `type` | `button`\|`submit`\|`reset` | `button` | |
| `icon` | nom d'icône ou `null` | `null` | Rendu via `<x-halo::icon>` |
| `iconPosition` | `left`\|`right` | `left` | Ignoré si `loading` |
| `loading` | `bool` | `false` | Remplace l'icône par un spinner, pose `aria-busy="true"`, désactive le bouton |
| `disabled` | `bool` | `false` | |

Tout attribut supplémentaire (`class`, `wire:click`, `@click`, ...) passe tel quel sur l'élément `<button>`. Une `class` fournie surcharge les classes propres du composant pour la même famille d'utilitaires Tailwind (voir `halo_merge_classes()`).

## Exemples

```blade
<x-halo::button variant="primary" icon="check">
    Enregistrer
</x-halo::button>

<x-halo::button variant="danger" size="sm" icon="trash" icon-position="right">
    Supprimer
</x-halo::button>

<x-halo::button :loading="true">
    Enregistrement...
</x-halo::button>
```

## Accessibilité

`disabled` et `loading` posent tous les deux l'attribut natif `disabled` (un état de chargement ne doit pas être actionnable). `aria-busy` reflète l'état de chargement pour les lecteurs d'écran.
