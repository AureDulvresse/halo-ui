---
layout: default
title: Divider
permalink: /fr/components/divider/
lang: fr
---

# Divider

`resources/views/components/halo/divider.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `orientation` | `horizontal`\|`vertical` | `horizontal` | |
| `label` | `string` ou `null` | `null` | Horizontal uniquement — affiche un texte centré dans le trait |

## Exemples

```blade
<x-halo::divider />
<x-halo::divider label="OU" />
<x-halo::divider orientation="vertical" class="h-6" />
```

Rend `role="separator"` dans les trois cas (un simple `<hr>`, un `<div>` avec label, ou un `<span>` vertical).
