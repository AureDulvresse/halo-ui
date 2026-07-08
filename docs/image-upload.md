---
layout: default
title: Image Upload
permalink: /components/image-upload/
---

# Image Upload

`resources/views/components/halo/image-upload.blade.php`

Like [File Upload](../file-upload), but restricted to images (`accept="image/*"`) and rendering a thumbnail grid with live previews instead of a file-name list.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `name` | `string` | `image` | Gets `[]` appended automatically when `multiple` |
| `multiple` | `bool` | `false` | |
| `disabled` | `bool` | `false` | |
| `id` | `string` or `null` | auto-generated | |

## Example

```blade
<form method="POST" action="/profile/avatar" enctype="multipart/form-data">
    @csrf
    <x-halo::image-upload name="avatar" />
    <x-halo::button type="submit">Save</x-halo::button>
</form>
```

## Implementation

Same drag-and-drop/`DataTransfer` mechanics as File Upload (`Alpine.data('haloImageUpload', ...)`), plus a preview per file via `URL.createObjectURL(file)`. Each preview's object URL is revoked (`URL.revokeObjectURL`) when its file is removed, so discarding a large image before submitting doesn't leak the blob for the lifetime of the page.
