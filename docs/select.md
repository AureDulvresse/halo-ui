# Select

`resources/views/components/halo/select.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.select.size` |
| `options` | `array<value, label>` or `null` | `null` | Renders `<option>` tags; falls back to the slot when omitted |
| `invalid` | `bool` | `false` | Sets `aria-invalid="true"`. Implied by `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | Falls back to `name`, then a random id |
| `error` | `string` or `null` | `null` | Renders a message below the field, wired via `aria-describedby`, and implies `invalid` |

## Examples

```blade
<x-halo::select name="country" :options="['fr' => 'France', 'us' => 'United States']" />

<x-halo::select name="country">
    <option value="fr">France</option>
    <option value="us">United States</option>
</x-halo::select>

<x-halo::select name="country" error="Pick a country" />
```

The chevron icon on the right is decorative (`pointer-events-none`, `aria-hidden`) — the native `<select>` still handles all interaction.
