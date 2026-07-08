# Switch

`resources/views/components/halo/switch.blade.php`

A toggle for a boolean setting — the same purpose as Checkbox, but the track/thumb shape communicates "on/off" rather than "checked item in a list," which is what most settings/preferences UIs expect.

No JavaScript — a native `<input type="checkbox" role="switch">` styled with `peer`/`peer-checked` and an `after:` pseudo-element for the thumb (so the thumb only needs to be a sibling of the input, not a separately-toggled nested element).

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `id` | `string` or `null` | auto-generated (or the `name` attribute) | Shared between the `<label for>` and the input |
| `disabled` | `bool` | `false` | Also visually dims the label |

Any extra attributes (e.g. `name`, `:checked`, `wire:model`) pass through to the `<input>`. The slot, if non-empty, renders as the visible label text.

## Examples

```blade
<x-halo::switch name="notifications">Email notifications</x-halo::switch>

<x-halo::switch name="beta" checked>Beta features</x-halo::switch>

<x-halo::switch name="locked" disabled>Locked setting</x-halo::switch>
```

## Accessibility

`role="switch"` on the input tells assistive tech this is a two-state toggle, not a checklist item — its accessible state is the native `checked` property, same as a checkbox. Keyboard support (Space to toggle, Tab to focus) is native, not simulated.
