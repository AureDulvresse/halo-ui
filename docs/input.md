# Input

`resources/views/components/halo/input.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.input.size` |
| `icon` | icon name or `null` | `null` | Rendered inside the field via `<x-halo::icon>` |
| `iconPosition` | `left`\|`right` | `left` | |
| `invalid` | `bool` | `false` | Sets `aria-invalid="true"` and switches the border/ring to `--halo-danger`. Implied by `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | Falls back to the `name` attribute, then a random id — always present so a `<label for>` has a target |
| `error` | `string` or `null` | `null` | Renders a message below the field, wired to it via `aria-describedby`, and implies `invalid` |

Any extra attributes (`name`, `type`, `placeholder`, `value`, `wire:model`, ...) pass through to the `<input>` element.

## Examples

```blade
<label for="email">Email</label>
<x-halo::input id="email" name="email" type="email" icon="mail" placeholder="you@example.com" />

<x-halo::input name="promo" error="This code has expired" value="not-a-code" />

<x-halo::input name="locked" :disabled="true" value="read only" />
```

## Accessibility

The component does not render its own `<label>` — pair it with one and point `for` at the input's `id` (explicit or auto-generated). Passing `error` sets `aria-invalid="true"` and `aria-describedby` on the field automatically, and renders the message in a `<p>` with a matching `id` — no manual wiring needed. Use bare `invalid` instead when you only want the visual state (e.g. live validation before a message is ready).
