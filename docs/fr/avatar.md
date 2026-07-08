---
layout: default
title: Avatar
permalink: /fr/components/avatar/
lang: fr
---

# Avatar

`resources/views/components/halo/avatar.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `src` | `string` ou `null` | `null` | Rend un `<img>` si défini |
| `alt` | `string` | `''` | |
| `initials` | `string` ou `null` | `null` | Texte de repli quand il n'y a pas de `src` |
| `size` | `xs`\|`sm`\|`md`\|`lg`\|`xl` | `md` | |
| `status` | `online`\|`offline`\|`busy`\|`away`\|`null` | `null` | Affiche un point coloré dans le coin |

Retombe sur une icône `user` générique quand il n'y a ni `src` ni `initials`.

## Exemples

```blade
<x-halo::avatar src="/avatars/aure.jpg" alt="Aure Dulvresse" status="online" />
<x-halo::avatar initials="AD" size="lg" />
<x-halo::avatar />
```
