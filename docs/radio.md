# Radio

`resources/views/components/halo/radio.blade.php`

Renders a native `<input type="radio">` wrapped in a `<label>`.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `id` | `string` or `null` | auto-generated (random) | Deliberately does **not** fall back to `name` — radios in the same group share `name`, and reusing it as `id` would produce duplicate ids |
| `disabled` | `bool` | `false` | |

The slot becomes the visible label text.

## Examples

```blade
<x-halo::radio name="plan" value="monthly" checked>Monthly</x-halo::radio>
<x-halo::radio name="plan" value="yearly">Yearly</x-halo::radio>
```
