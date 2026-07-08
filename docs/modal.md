# Modal

`resources/views/components/halo/modal/{index,header,body,footer}.blade.php`

Opened and closed by name, from anywhere — no `:open` prop to keep in sync between a trigger and the modal.

## Props

`<x-halo::modal>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `name` | `string` | *required* | Identifies this modal for `open-modal`/`close-modal` events |
| `size` | `sm`\|`md`\|`lg`\|`xl` | `md` | |

`modal.header`, `modal.body`, `modal.footer` take no props beyond pass-through attributes.

## Examples

```blade
<x-halo::button @click="$dispatch('open-modal', 'confirm-delete')">
    Delete account
</x-halo::button>

<x-halo::modal name="confirm-delete">
    <x-halo::modal.header>Delete account?</x-halo::modal.header>

    <x-halo::modal.body>
        This can't be undone.
    </x-halo::modal.body>

    <x-halo::modal.footer>
        <x-halo::button variant="outline" @click="$dispatch('close-modal')">Cancel</x-halo::button>
        <x-halo::button variant="danger">Delete</x-halo::button>
    </x-halo::modal.footer>
</x-halo::modal>
```

Dispatching `close-modal` with no name (or a matching name) closes the matching modal(s). Escape and clicking the backdrop close it too.

## Accessibility

Renders `role="dialog"` and `aria-modal="true"`. The close button in the corner has `aria-label="Close"`. Opening the modal moves focus to the first focusable element inside it (falling back to the panel itself); `Tab`/`Shift+Tab` cycle within the panel instead of escaping to the rest of the page (a focus trap, per the [WAI-ARIA dialog pattern](https://www.w3.org/WAI/ARIA/apg/patterns/dialog-modal/)); closing returns focus to whatever had it before the modal opened.

The panel caps its own height at `calc(100vh - 2rem)` and scrolls internally (`overflow-y-auto`) — long content scrolls inside the dialog instead of pushing it off-screen on short viewports (phones, landscape orientation).

## Implementation

Registered as `Alpine.data('haloModal', ...)` in `resources/js/init.js`, listening on the `window` for `open-modal`/`close-modal` custom events matching its `name`. The panel is referenced via `x-ref="panel"` so the focus-trap logic (`focusFirst()`, `trapFocus()`) can query its focusable descendants without needing to know the modal's content ahead of time.
