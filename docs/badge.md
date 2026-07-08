---
layout: default
title: Badge
permalink: /components/badge/
---

# Badge

`resources/views/components/halo/badge.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `variant` | `primary`\|`secondary`\|`success`\|`danger`\|`warning` | `secondary` | Config default: `halo.defaults.badge.variant` |

Any extra attributes pass through to the `<span>` element.

## Examples

```blade
<x-halo::badge variant="success">Active</x-halo::badge>
<x-halo::badge variant="danger">Failed</x-halo::badge>
<x-halo::badge>Default</x-halo::badge>
```

## Accessibility

A badge is decorative text by default (plain `<span>`). If you use one as a live status indicator rather than a static label, add `role="status"` yourself via the component's pass-through attributes — it isn't baked in, since most badges aren't live regions.
