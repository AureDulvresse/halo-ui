---
layout: default
title: Tooltip
permalink: /fr/components/tooltip/
lang: fr
---

# Tooltip

`resources/views/components/halo/tooltip.blade.php`

Un court indice textuel affiché au survol ou au focus clavier de son déclencheur. Pour du contenu interactif (formulaires, boutons, liens à l'intérieur du panneau), utilise plutôt [Popover](../popover) — un tooltip est du texte annoncé, pas une région focusable.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `position` | `top`\|`bottom`\|`left`\|`right` | `top` (défaut config : `halo.defaults.tooltip.position`) | Position du panneau par rapport au déclencheur |

Prend un slot nommé `trigger` et un slot par défaut pour le texte du tooltip.

## Exemples

```blade
<x-halo::tooltip position="bottom">
    <x-slot:trigger>
        <x-halo::button variant="ghost" icon="information-circle" />
    </x-slot:trigger>

    Synchronisé il y a 2 minutes
</x-halo::tooltip>
```

## Accessibilité

Affiché sur `mouseenter`/`focusin` du conteneur, masqué sur `mouseleave`/`focusout` — donc atteignable au clavier, pas seulement à la souris, selon le [pattern WAI-ARIA tooltip](https://www.w3.org/WAI/ARIA/apg/patterns/tooltip/). Au montage, `aria-describedby` est posé automatiquement sur le premier élément du déclencheur, pour que les technologies d'assistance annoncent le texte du tooltip en plus du label propre du déclencheur.

## Implémentation

Enregistré comme `Alpine.data('haloTooltip', ...)` dans `resources/js/init.js`. Pas de touche de fermeture ni de piège à focus — un tooltip n'est pas interactif, il n'a donc jamais besoin de garder le focus.
