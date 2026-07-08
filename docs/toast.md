# Toast

`resources/views/components/halo/toast.blade.php`

A single global notification queue. Place `<x-halo::toast />` once in your layout; push notifications from anywhere via the Alpine store.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `position` | `bottom-right`\|`bottom-left`\|`top-right`\|`top-left` | `bottom-right` | |

## Usage

```blade
{{-- once, in your layout --}}
<x-halo::toast />
```

```html
<button @click="$store.haloToast.push('Saved!', 'success')">Save</button>
```

```js
// from any script, once Alpine is booted
Alpine.store('haloToast').push('Something went wrong', 'danger');
```

`push(message, variant = 'info', duration = 4000)` returns the toast's id and auto-dismisses after `duration` ms (pass `0` to disable auto-dismiss). Variants: `info`, `success`, `warning`, `danger`.

## Accessibility

The container has `aria-live="polite"` and `aria-atomic="true"` so screen readers announce new toasts without interrupting. Each toast has `role="status"` and its own dismiss button.

## Implementation

Registered as `Alpine.store('haloToast', ...)` in `resources/js/init.js` — a store rather than a per-component `Alpine.data()`, since the queue is genuinely global state shared across the whole page, not local to one element.
