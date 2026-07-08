# Accordion

`resources/views/components/halo/accordion/{index,item}.blade.php`

## Props

`<x-halo::accordion>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `multiple` | `bool` | `false` | Allow more than one item open at once; otherwise opening one closes any other |

`accordion.item`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `title` | `string` | *required* | Rendered inside the toggle button |
| `name` | `string` or `null` | auto-generated | Tracking key for open/closed state — pass one explicitly if you need to reference it (e.g. to open an item programmatically) |

## Examples

```blade
<x-halo::accordion>
    <x-halo::accordion.item title="What is HaloUI?">
        A Blade component library for Laravel.
    </x-halo::accordion.item>

    <x-halo::accordion.item title="Is it free?">
        Yes, MIT licensed.
    </x-halo::accordion.item>
</x-halo::accordion>

<x-halo::accordion multiple>
    {{-- both of these can be open at the same time --}}
    <x-halo::accordion.item name="shipping" title="Shipping">...</x-halo::accordion.item>
    <x-halo::accordion.item name="returns" title="Returns">...</x-halo::accordion.item>
</x-halo::accordion>
```

## Accessibility

Each toggle button has `aria-expanded` reflecting its open state. The chevron icon rotates 180° when open (a visual cue, not itself accessible information — `aria-expanded` carries that).

## Implementation

Registered as `Alpine.data('haloAccordion', ...)` in `resources/js/init.js`. `openItems` is an array of item names; `toggle()` either appends to it (when `multiple`) or replaces it outright. Note the `<x-halo::icon ::style="...">` double-colon in `accordion/item.blade.php` — a single colon would make Blade evaluate the expression as PHP immediately (since `<x-halo::icon>` is a real component tag), which fails because `isOpen()` is an Alpine method, not a PHP function. The double colon tells Blade to emit the attribute literally so Alpine binds it client-side instead.
