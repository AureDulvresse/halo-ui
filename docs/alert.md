# Alert

`resources/views/components/halo/alert.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `variant` | `info`\|`success`\|`warning`\|`danger` | `info` | Config default: `halo.defaults.alert.variant` |
| `icon` | icon name or `null` | variant's own icon | Defaults to `information-circle`, `check-circle`, `exclamation-triangle`, or `exclamation-circle` for `info`/`success`/`warning`/`danger`; pass a different icon name to override |
| `dismissible` | `bool` | `false` | Adds a close button with local Alpine state (`x-data="{ show: true }"`) — no global store needed for this |

## Examples

```blade
<x-halo::alert variant="success">
    Your changes have been saved.
</x-halo::alert>

<x-halo::alert variant="danger" dismissible>
    Something went wrong — please try again.
</x-halo::alert>
```

## Accessibility

Rendered with `role="alert"`. The icon is decorative (`aria-hidden`) — the variant and message convey the meaning; don't rely on icon shape alone.
