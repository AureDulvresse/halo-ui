# Input

`resources/views/components/halo/input.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.input.size` |
| `icon` | icon name or `null` | `null` | Rendered inside the field via `<x-halo::icon>` |
| `iconPosition` | `left`\|`right` | `left` | |
| `invalid` | `bool` | `false` | Sets `aria-invalid="true"` and switches the border/ring to `--halo-danger` |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | Falls back to the `name` attribute, then a random id — always present so a `<label for>` has a target |

Any extra attributes (`name`, `type`, `placeholder`, `value`, `wire:model`, ...) pass through to the `<input>` element.

## Examples

```blade
<label for="email">Email</label>
<x-halo::input id="email" name="email" type="email" icon="mail" placeholder="you@example.com" />

<x-halo::input name="promo" :invalid="true" value="not-a-code" />

<x-halo::input name="locked" :disabled="true" value="read only" />
```

## Accessibility

The component does not render its own `<label>` — pair it with one and point `for` at the input's `id` (explicit or auto-generated). `invalid` communicates the error state to assistive tech via `aria-invalid`; pair it with `aria-describedby` pointing at your error message.
