---
layout: default
title: Icon
permalink: /fr/components/icon/
lang: fr
---

# Icon

`resources/views/components/halo/icon.blade.php`

Résout une icône du set Blade Icons `halo` (`resources/icons/halo/*.svg`, enregistré dans `HaloServiceProvider::registerBladeIcons()`) par son nom.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `name` | nom de fichier d'icône sans `.svg`, ou `null` | `null` | Ne rend rien si omis |
| `size` | `xs`\|`sm`\|`md`\|`lg`\|`xl` | `md` | Mappé vers des classes `w-*`/`h-*` |

Tout attribut supplémentaire passe tel quel sur le `<svg>` rendu.

## Icônes disponibles

`check`, `check-circle`, `chevron-down`, `chevron-up`, `edit`, `exclamation-circle`, `exclamation-triangle`, `information-circle`, `lock`, `mail`, `trash`, `user`, `x`.

## Exemples

```blade
<x-halo::icon name="check" />
<x-halo::icon name="trash" size="lg" class="text-halo-danger" />
```

## Accessibilité

Rendu avec `aria-hidden="true"` par défaut — les icônes ici sont des compléments décoratifs à un contrôle déjà étiqueté (le texte d'un Button, le placeholder d'un Input). Si une icône est un jour le *seul* contenu d'un élément interactif, cet élément a besoin de son propre nom accessible (ex. `aria-label` sur le bouton englobant) ; Icon lui-même n'en fournira pas.

## Note d'implémentation

Icon se résout via `<x-dynamic-component :component="'halo-' . $name">` — le nom du composant dynamique est construit à partir du nom de l'icône elle-même, jamais du *set* d'icônes. Une version antérieure de ce composant construisait le nom à partir du set, ce qui le faisait se résoudre vers lui-même et planter par débordement de pile. Si tu étends ce composant, garde cette distinction en tête.
