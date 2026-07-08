---
layout: default
title: Divider
permalink: /components/divider/
---

# Divider

`resources/views/components/halo/divider.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `orientation` | `horizontal`\|`vertical` | `horizontal` | |
| `label` | `string` or `null` | `null` | Horizontal only — renders text centered in the rule |

## Examples

```blade
<x-halo::divider />
<x-halo::divider label="OR" />
<x-halo::divider orientation="vertical" class="h-6" />
```

Renders `role="separator"` in all three cases (a plain `<hr>`, a labeled `<div>`, or a vertical `<span>`).
