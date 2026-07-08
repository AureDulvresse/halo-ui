# Avatar

`resources/views/components/halo/avatar.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `src` | `string` or `null` | `null` | Renders an `<img>` when set |
| `alt` | `string` | `''` | |
| `initials` | `string` or `null` | `null` | Fallback text when there's no `src` |
| `size` | `xs`\|`sm`\|`md`\|`lg`\|`xl` | `md` | |
| `status` | `online`\|`offline`\|`busy`\|`away`\|`null` | `null` | Renders a colored dot in the corner |

Falls back to a generic `user` icon when there's no `src` and no `initials`.

## Examples

```blade
<x-halo::avatar src="/avatars/aure.jpg" alt="Aure Dulvresse" status="online" />
<x-halo::avatar initials="AD" size="lg" />
<x-halo::avatar />
```
