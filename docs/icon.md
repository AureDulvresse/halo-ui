# Icon

`resources/views/components/halo/icon.blade.php`

Resolves an icon from the `halo` Blade Icons set (`resources/icons/halo/*.svg`, registered in `HaloServiceProvider::registerBladeIcons()`) by name.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `name` | icon filename without `.svg`, or `null` | `null` | Renders nothing if omitted |
| `size` | `xs`\|`sm`\|`md`\|`lg`\|`xl` | `md` | Maps to `w-*`/`h-*` classes |

Any extra attributes pass through to the rendered `<svg>`.

## Available icons

`check`, `check-circle`, `chevron-down`, `chevron-up`, `edit`, `exclamation-circle`, `exclamation-triangle`, `information-circle`, `lock`, `mail`, `trash`, `user`, `x`.

## Examples

```blade
<x-halo::icon name="check" />
<x-halo::icon name="trash" size="lg" class="text-halo-danger" />
```

## Accessibility

Rendered with `aria-hidden="true"` by default — icons here are decorative adjuncts to a labeled control (a Button's text, an Input's placeholder). If an icon is ever the *only* content of an interactive element, the element needs its own accessible name (e.g. `aria-label` on the enclosing button); Icon itself won't provide one.

## Implementation note

Icon resolves via `<x-dynamic-component :component="'halo-' . $name">` — the dynamic component name is built from the icon's own name, never from the icon *set*. An earlier version of this component built the name from the set instead, which made it resolve back to itself and crash with a stack overflow. If you're extending this component, keep that distinction in mind.
