---
layout: default
title: Text
permalink: /fr/components/text/
lang: fr
---

# Text

`resources/views/components/halo/text.blade.php`

Texte courant à une échelle de taille/couleur cohérente — le pendant non-titre de [Heading](../heading).

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `as` | `p`\|`span`\|`div`\|`blockquote` | `p` | Tout ce qui sort de cette liste retombe silencieusement sur `p` |
| `size` | `xs`\|`sm`\|`base`\|`lg` | `base` | |
| `muted` | `bool` | `false` | Rendu à 60% d'opacité — pour le texte secondaire/de support |

## Exemples

```blade
<x-halo::text>Paragraphe de texte courant.</x-halo::text>
<x-halo::text as="span" size="sm" muted>Mis à jour il y a 2 minutes</x-halo::text>
```
