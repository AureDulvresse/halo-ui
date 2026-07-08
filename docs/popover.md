# Popover

`resources/views/components/halo/popover.blade.php`

An overlay panel for arbitrary rich content — forms, previews, secondary actions — triggered by a click. Structurally similar to [Dropdown](dropdown), but without `role="menu"`/arrow-key roving focus, since its content isn't a list of commands.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `align` | `left`\|`right` | `left` (config default: `halo.defaults.popover.align`) | Panel alignment relative to the trigger |

Takes a `trigger` named slot and a default slot for the panel content.

## Examples

```blade
<x-halo::popover align="right">
    <x-slot:trigger>
        <x-halo::button variant="outline">Filters</x-halo::button>
    </x-slot:trigger>

    <div class="space-y-3">
        <x-halo::label for="status">Status</x-halo::label>
        <x-halo::select id="status" :options="['open' => 'Open', 'closed' => 'Closed']" />
    </div>
</x-halo::popover>
```

## Accessibility

`role="dialog"` on the panel. Opening moves focus to the first focusable element inside it; closing (via escape, an outside click, or your own trigger logic) returns focus to whatever opened it — the same focus-return discipline as Modal and Dropdown, without a full focus trap since a popover is dismissible by clicking elsewhere.

## Implementation

Registered as `Alpine.data('haloPopover', ...)` in `resources/js/init.js`.
