---
layout: default
title: Spinner
permalink: /fr/components/spinner/
lang: fr
---

# Spinner

`resources/views/components/halo/spinner.blade.php`

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `size` | `xs`\|`sm`\|`md`\|`lg`\|`xl` | `md` | |

Rendu avec `role="status"` et `aria-label="Loading"`.

## Exemples

```blade
<x-halo::spinner />
<x-halo::spinner size="lg" class="text-halo-primary" />
```

Utilisé en interne par `<x-halo::button :loading="true">` — les deux partagent ce composant plutôt que de dupliquer le SVG.
