---
layout: default
title: Toggle
permalink: /fr/components/toggle/
lang: fr
---

# Toggle

`resources/views/components/halo/toggle.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `pressed` | `bool` | `false` | État initial enfoncé/relâché |
| `variant` | `default`\|`outline` | `default` | Défaut config : `halo.defaults.toggle.variant` |
| `size` | `sm`\|`md`\|`lg` | `md` | Défaut config : `halo.defaults.toggle.size` |
| `icon` | nom d'icône ou `null` | `null` | Rendu via `<x-halo::icon>` |

Tout attribut supplémentaire (`class`, `wire:click`, `@click`, ...) passe tel quel sur l'élément `<button>`. Une `class` fournie surcharge les classes propres du composant pour la même famille d'utilitaires Tailwind (voir `halo_merge_classes()`).

## Exemples

```blade
<x-halo::toggle icon="bold">
    Gras
</x-halo::toggle>

<x-halo::toggle :pressed="true" variant="outline">
    Italique
</x-halo::toggle>
```

## Accessibilité

Contrairement à une case à cocher, un toggle est un contrôle enfoncé/relâché autonome — le pattern WAI-ARIA du bouton avec `aria-pressed`. Le composant met à jour `:aria-pressed` de façon réactive à chaque clic, si bien que les lecteurs d'écran annoncent l'état courant sans libellé ni champ caché séparés.
