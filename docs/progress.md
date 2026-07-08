# Progress

`resources/views/components/halo/progress.blade.php`

A determinate or indeterminate progress bar. No JavaScript for the determinate case — the bar width is a plain inline `style`; `indeterminate` swaps in a CSS keyframe animation (`resources/css/halo.css`) instead.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `value` | `int`\|`float` | `0` | Ignored when `indeterminate` |
| `max` | `int`\|`float` | `100` | |
| `indeterminate` | `bool` | `false` | Sweeps a fixed-width bar instead of reflecting `value`/`max` |

## Examples

```blade
<x-halo::progress value="40" />

<x-halo::progress value="{{ $uploaded }}" max="{{ $total }}" />

<x-halo::progress indeterminate />
```

## Accessibility

`role="progressbar"` with `aria-valuemin`/`aria-valuemax` always set; `aria-valuenow` is set for the determinate case and deliberately omitted when `indeterminate` — an indeterminate operation has no meaningful "current value" to announce.

The indeterminate sweep respects `prefers-reduced-motion: reduce` (slowed to a 3s cycle rather than disabled outright — a static "indeterminate" bar reads as stuck, not as in-progress).
