# Text

`resources/views/components/halo/text.blade.php`

Body copy at a consistent size/color scale — the non-heading counterpart to [Heading](heading).

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `as` | `p`\|`span`\|`div`\|`blockquote` | `p` | Anything outside this whitelist silently falls back to `p` |
| `size` | `xs`\|`sm`\|`base`\|`lg` | `base` | |
| `muted` | `bool` | `false` | Renders at 60% foreground opacity — for secondary/supporting text |

## Examples

```blade
<x-halo::text>Regular paragraph copy.</x-halo::text>
<x-halo::text as="span" size="sm" muted>Last updated 2 minutes ago</x-halo::text>
```
