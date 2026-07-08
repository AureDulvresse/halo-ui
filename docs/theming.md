# Theming

HaloUI's theme is a set of CSS custom properties, not a config array. This is deliberate: an earlier version had a config-driven "active theme" that never actually changed anything rendered, because the component classes were hardcoded Tailwind utilities that never read the config. v4 fixes that by making the tokens the single source of truth that both the config *and* the components point to.

## How it works

`resources/css/theme.css` defines `--halo-*` variables scoped to a `[data-theme="..."]` attribute, and maps them into real Tailwind v4 utility classes via `@theme`:

```css
[data-theme='aurora'] {
    --halo-primary: #7c3aed;
    --halo-primary-foreground: #fff;
    /* ... */
}

@theme {
    --color-halo-primary: var(--halo-primary);
    /* generates .bg-halo-primary, .text-halo-primary, .border-halo-primary, ... */
}
```

Every component's Blade file uses `bg-halo-primary`, `text-halo-foreground`, `rounded-halo`, etc. — never a literal color. Switching `data-theme` on any ancestor element (typically `<html>`) recolors every component under it, live, with no rebuild.

## Built-in themes

| Theme | `data-theme` | |
|---|---|---|
| **Halo** | `halo` (default) | Blue, standard radius |
| **Aurora** | `aurora` | Violet/teal, larger radius |
| **Eclipse** | `eclipse` | Dark background |

## Switching themes

Server-side, for the correct theme on first paint:

```blade
<html data-theme="{{ config('halo.theme.default') }}">
```

Client-side, via the Alpine store registered in `resources/js/init.js`:

```blade
<button @click="$store.haloTheme.set('eclipse')">Eclipse</button>
```

The store persists the choice to `localStorage` and re-applies it on load.

## Adding a theme

1. Add a `[data-theme="yourname"]` block to `resources/css/theme.css` with the same variable names as the existing themes (`--halo-primary`, `--halo-primary-foreground`, `--halo-secondary`, `--halo-secondary-foreground`, `--halo-success`, `--halo-success-foreground`, `--halo-danger`, `--halo-danger-foreground`, `--halo-warning`, `--halo-warning-foreground`, `--halo-info`, `--halo-info-foreground`, `--halo-background`, `--halo-foreground`, `--halo-border`, `--halo-ring`, `--halo-radius`).
2. Add `'yourname'` to `halo.theme.available` in `config/halo.php`.
3. Add `'yourname'` to the `THEMES` array in `resources/js/init.js`.

## Component-level overrides

Pass `class` to any component — it's merged with, and takes priority over, the component's own classes for the same utility family:

```blade
<x-halo::button class="rounded-none">Square corners</x-halo::button>
```

This is handled by `halo_merge_classes()` in `src/helpers.php`, which tracks the utility families components actually vary (`bg-`, `text-`, `border-`, `rounded-`, `p{x,y,t,r,b,l}-`, `w-`, `h-`, `gap-`) and keeps the last occurrence of each.
