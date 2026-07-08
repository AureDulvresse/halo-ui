---
layout: default
title: Badge
permalink: /fr/components/badge/
lang: fr
---

# Badge

`resources/views/components/halo/badge.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `variant` | `primary`\|`secondary`\|`success`\|`danger`\|`warning` | `secondary` | Défaut config : `halo.defaults.badge.variant` |

Tout attribut supplémentaire passe tel quel sur l'élément `<span>`.

## Exemples

```blade
<x-halo::badge variant="success">Actif</x-halo::badge>
<x-halo::badge variant="danger">Échec</x-halo::badge>
<x-halo::badge>Par défaut</x-halo::badge>
```

## Accessibilité

Un badge est du texte décoratif par défaut (simple `<span>`). Si tu l'utilises comme indicateur de statut en direct plutôt que comme étiquette statique, ajoute toi-même `role="status"` via les attributs passthrough du composant — ce n'est pas intégré d'office, puisque la plupart des badges ne sont pas des régions live.
