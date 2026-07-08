# Button

`resources/views/components/halo/button.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `variant` | `primary`\|`secondary`\|`outline`\|`ghost`\|`danger` | `primary` | Config default: `halo.defaults.button.variant` |
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.button.size` |
| `type` | `button`\|`submit`\|`reset` | `button` | |
| `icon` | icon name or `null` | `null` | Rendered via `<x-halo::icon>` |
| `iconPosition` | `left`\|`right` | `left` | Ignored while `loading` |
| `loading` | `bool` | `false` | Replaces the icon with a spinner, sets `aria-busy="true"`, disables the button |
| `disabled` | `bool` | `false` | |

Any extra attributes (`class`, `wire:click`, `@click`, ...) pass through to the `<button>` element. A passed `class` overrides the component's own classes for the same Tailwind utility family (see `halo_merge_classes()`).

## Examples

```blade
<x-halo::button variant="primary" icon="check">
    Save changes
</x-halo::button>

<x-halo::button variant="danger" size="sm" icon="trash" icon-position="right">
    Delete
</x-halo::button>

<x-halo::button :loading="true">
    Saving...
</x-halo::button>
```

## Accessibility

`disabled` and `loading` both set the native `disabled` attribute (loading states shouldn't be operable). `aria-busy` reflects the loading state for screen readers.
