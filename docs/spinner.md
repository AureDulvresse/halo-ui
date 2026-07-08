# Spinner

`resources/views/components/halo/spinner.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `xs`\|`sm`\|`md`\|`lg`\|`xl` | `md` | |

Renders with `role="status"` and `aria-label="Loading"`.

## Examples

```blade
<x-halo::spinner />
<x-halo::spinner size="lg" class="text-halo-primary" />
```

Used internally by `<x-halo::button :loading="true">` — the two share this component rather than duplicating the SVG.
