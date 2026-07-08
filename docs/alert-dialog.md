---
layout: default
title: AlertDialog
permalink: /components/alert-dialog/
---

# AlertDialog

`resources/views/components/halo/alert-dialog/{index,header,body,footer}.blade.php`

A stricter [Modal](../modal) for confirmations that must not be dismissed accidentally: it never closes on a backdrop click or on `Escape`, only via an explicit action in its footer (e.g. Cancel / Confirm).

## Props

`<x-halo::alert-dialog>`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `name` | `string` | *required* | Identifies this dialog for `open-alert-dialog`/`close-alert-dialog` events |
| `size` | `sm`\|`md`\|`lg`\|`xl` | `md` | |

`alert-dialog.header`, `alert-dialog.body`, `alert-dialog.footer` take no props beyond pass-through attributes.

## Examples

```blade
<x-halo::button variant="danger" @click="$dispatch('open-alert-dialog', 'confirm-delete')">
    Delete account
</x-halo::button>

<x-halo::alert-dialog name="confirm-delete">
    <x-halo::alert-dialog.header>Delete account?</x-halo::alert-dialog.header>

    <x-halo::alert-dialog.body>
        This can't be undone. All of your data will be permanently removed.
    </x-halo::alert-dialog.body>

    <x-halo::alert-dialog.footer>
        <x-halo::button variant="outline" @click="$dispatch('close-alert-dialog', 'confirm-delete')">Cancel</x-halo::button>
        <x-halo::button variant="danger" @click="$dispatch('close-alert-dialog', 'confirm-delete')">Delete</x-halo::button>
    </x-halo::alert-dialog.footer>
</x-halo::alert-dialog>
```

## Accessibility

Renders `role="alertdialog"` and `aria-modal="true"` (rather than [Modal](../modal)'s `role="dialog"`), per the [WAI-ARIA alertdialog pattern](https://www.w3.org/WAI/ARIA/apg/patterns/alertdialog/) — the same focus-trap and focus-restore behavior as Modal applies (`Tab`/`Shift+Tab` cycle within the panel; closing returns focus to whatever triggered it), but there is deliberately **no** dismiss button, no backdrop-click handler, and no `Escape` handler. The only way out is one of the actions your footer provides, which is the point: an alert dialog interrupts the user for a decision they must make explicitly.

## Implementation

Registered as its own `Alpine.data('haloAlertDialog', ...)` factory in `resources/js/init.js` — a distinct factory rather than an `alertMode` flag added to `haloModal`, so the "no accidental dismiss" behavior can't regress by a future change to Modal, and so a stray `$dispatch('close-modal')` elsewhere in an app can never dismiss an alert dialog. For the same reason, it listens on its own `open-alert-dialog`/`close-alert-dialog` window events instead of reusing Modal's `open-modal`/`close-modal`.
