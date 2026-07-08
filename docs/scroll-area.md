---
layout: default
title: ScrollArea
permalink: /components/scroll-area/
---

# ScrollArea

`resources/views/components/halo/scroll-area.blade.php`

A scrollable container with a styled scrollbar (thin, themed via `-halo-` tokens) instead of the browser's default. No JavaScript.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `height` | `string` or `null` | `null` | If given, applied as an inline `max-height` (e.g. `20rem`). If omitted, the area scrolls only when its content overflows a `max-h-full` parent |

## Examples

```blade
<x-halo::scroll-area height="20rem">
    <ul class="space-y-2 p-4">
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</x-halo::scroll-area>
```

## Accessibility

Purely a visual/scrolling affordance — it doesn't change the semantics or focus order of its content. Keyboard users can still scroll the region natively via arrow keys/Page Up/Page Down once it or a focusable child inside it has focus.
