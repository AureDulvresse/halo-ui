# Textarea

`resources/views/components/halo/textarea.blade.php`

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Config default: `halo.defaults.textarea.size` |
| `rows` | `int` | `3` | |
| `resize` | `none`\|`vertical`\|`horizontal`\|`both` | `vertical` | |
| `invalid` | `bool` | `false` | Sets `aria-invalid="true"` |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | Falls back to `name`, then a random id |

Any extra attributes (`name`, `placeholder`, `wire:model`, ...) pass through to the `<textarea>`.

## Examples

```blade
<x-halo::textarea name="bio" rows="5" placeholder="Tell us about yourself" />
<x-halo::textarea name="notes" resize="none" />
<x-halo::textarea name="notes" :invalid="true" />
```
