---
layout: default
title: Alert
permalink: /fr/components/alert/
lang: fr
---

# Alert

`resources/views/components/halo/alert.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `variant` | `info`\|`success`\|`warning`\|`danger` | `info` | Défaut config : `halo.defaults.alert.variant` |
| `icon` | nom d'icône ou `null` | icône propre au variant | Par défaut `information-circle`, `check-circle`, `exclamation-triangle`, ou `exclamation-circle` pour `info`/`success`/`warning`/`danger` ; passe un autre nom d'icône pour surcharger |
| `dismissible` | `bool` | `false` | Ajoute un bouton de fermeture avec un état Alpine local (`x-data="{ show: true }"`) — pas besoin de store global pour ça |

## Exemples

```blade
<x-halo::alert variant="success">
    Tes modifications ont été enregistrées.
</x-halo::alert>

<x-halo::alert variant="danger" dismissible>
    Une erreur est survenue — réessaie.
</x-halo::alert>
```

## Accessibilité

Rendu avec `role="alert"`. L'icône est décorative (`aria-hidden`) — le variant et le message portent le sens ; ne te fie pas à la seule forme de l'icône.
