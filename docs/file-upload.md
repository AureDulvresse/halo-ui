# File Upload

`resources/views/components/halo/file-upload.blade.php`

A drag-and-drop zone over a native `<input type="file">`, with a removable list of selected files. Fully functional in a real `<form>` — it's a real file input, not a JS-only widget standing in for one.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `name` | `string` | `file` | Gets `[]` appended automatically when `multiple` |
| `multiple` | `bool` | `false` | |
| `accept` | `string` or `null` | `null` | Native `accept` attribute (e.g. `.pdf,.docx`); also shown as a hint under the drop zone |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | |

## Example

```blade
<form method="POST" action="/documents" enctype="multipart/form-data">
    @csrf
    <x-halo::file-upload name="documents" multiple accept=".pdf,.docx" />
    <x-halo::button type="submit">Upload</x-halo::button>
</form>
```

## Accessibility

The drop zone is a `<label for>` wrapping a visually-hidden (`sr-only`, not `display:none`) native file input — it stays in the tab order and keyboard-activatable (Space/Enter opens the OS file picker), and the label gets a visible focus ring via `peer-focus-visible` when the hidden input has focus. Drag-and-drop is a progressive enhancement on top of that native input, not a replacement for it.

## Implementation

`Alpine.data('haloFileUpload', ...)` in `resources/js/init.js` tracks the selected files for display and rebuilds the input's `FileList` via the `DataTransfer` API when a file is removed — a plain JS array can't be reassigned to `input.files` directly, since it's a read-only, browser-native collection type.
