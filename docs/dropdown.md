# Dropdown

`resources/views/components/halo/dropdown/{index,item}.blade.php`

## Props

`<x-halo::dropdown>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `align` | `left`\|`right` | `left` | Panel alignment relative to the trigger |

Takes a `trigger` named slot and a default slot for the panel content.

`dropdown.item`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `href` | `string` or `null` | `null` | Renders an `<a>` when set, a `<button type="button">` otherwise |

## Examples

```blade
<x-halo::dropdown align="right">
    <x-slot:trigger>
        <x-halo::button variant="outline">Account</x-halo::button>
    </x-slot:trigger>

    <x-halo::dropdown.item href="/profile">Profile</x-halo::dropdown.item>
    <x-halo::dropdown.item href="/settings">Settings</x-halo::dropdown.item>
    <x-halo::dropdown.item>Sign out</x-halo::dropdown.item>
</x-halo::dropdown>
```

## Accessibility

The panel has `role="menu"`, items have `role="menuitem"`. Opening the menu focuses the first item; `↓`/`↑` roam between items (per the [WAI-ARIA menu pattern](https://www.w3.org/WAI/ARIA/apg/patterns/menu-button/)). Closes — and returns focus to the trigger — on escape, on clicking outside, or on selecting an item.

## Implementation

Registered as `Alpine.data('haloDropdown', ...)` in `resources/js/init.js`. The panel is referenced via `x-ref="panel"` so `menuItems()` can query `[role="menuitem"]` descendants for the roving-focus logic without `dropdown.item` needing to register itself anywhere.
