---
layout: default
title: StatCard
permalink: /components/stat-card/
---

# StatCard

`resources/views/components/halo/stat-card.blade.php`

A compact metric card for dashboards — a label, a large value, an optional icon, and an optional trend indicator. Composed from [Card](../card).

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `label` | `string` | *required* | Small muted heading above the value |
| `value` | `string`\|`number` | *required* | Rendered large and bold |
| `icon` | icon name or `null` | `null` | Rendered top-right via `<x-halo::icon>` |
| `trend` | `string` or `null` | `null` | Free-form text like `"+12%"` or `"-3%"` — colored green/red by its leading sign, neutral otherwise |

## Examples

```blade
<x-halo::stat-card label="Revenue" value="$12,400" icon="wallet" trend="+12%" />

<x-halo::stat-card label="Churn" value="3.2%" icon="trending-down" trend="-3%" />

<x-halo::stat-card label="Active Users" value="1,204" />
```

## Accessibility

Purely presentational content rendered with plain headings and text inside a `Card` — no interactive elements, so no extra ARIA is needed. The icon is decorative; add your own `aria-label` on the component if the value alone isn't descriptive enough for your context.
