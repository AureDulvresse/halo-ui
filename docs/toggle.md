---
layout: default
title: Toggle
permalink: /components/toggle/
---

# Toggle

`resources/views/components/halo/toggle.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `pressed` | `bool` | `false` | Initial pressed state |
| `variant` | `default`\|`outline` | `default` | Config default: `halo.defaults.toggle.variant` |
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.toggle.size` |
| `icon` | icon name or `null` | `null` | Rendered via `<x-halo::icon>` |

Any extra attributes (`class`, `wire:click`, `@click`, ...) pass through to the `<button>` element. A passed `class` overrides the component's own classes for the same Tailwind utility family (see `halo_merge_classes()`).

## Examples

```blade
<x-halo::toggle icon="bold">
    Bold
</x-halo::toggle>

<x-halo::toggle :pressed="true" variant="outline">
    Italic
</x-halo::toggle>
```

## Accessibility

Unlike a checkbox, a toggle is a single standalone pressed/unpressed control — the WAI-ARIA button pattern with `aria-pressed`. The component sets `:aria-pressed` reactively as the user clicks, so screen readers announce the current state without a separate label or hidden input.
