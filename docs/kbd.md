---
layout: default
title: Kbd
permalink: /components/kbd/
---

# Kbd

`resources/views/components/halo/kbd.blade.php`

A small inline element for displaying a keyboard key or shortcut, e.g. inside help text or a [Tooltip](../tooltip).

## Props

None beyond passthrough attributes — everything (`class`, ...) lands on the native `<kbd>` element.

## Examples

```blade
<p class="text-sm text-halo-foreground/80">
    Press <x-halo::kbd>Ctrl</x-halo::kbd> + <x-halo::kbd>K</x-halo::kbd> to open the command palette.
</p>
```

## Accessibility

Uses the native `<kbd>` element, which screen readers and browsers already understand as "keyboard input" — no extra ARIA needed.
