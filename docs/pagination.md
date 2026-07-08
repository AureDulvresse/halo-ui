---
layout: default
title: Pagination
permalink: /components/pagination/
---

# Pagination

`resources/views/components/halo/pagination.blade.php`

A "smart", self-contained component rather than a slot-composed one — it builds every page link itself from a `current`/`total`/`baseUrl` triple, so it doesn't need a paginator instance passed in. Purely server-rendered; no JavaScript.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `current` | `int` | `1` | The current page (required in practice) |
| `total` | `int` | `1` | The total number of pages (required in practice) |
| `baseUrl` | `string` | `''` | URL template with a `:page` placeholder, e.g. `/users?page=:page` (required in practice) |
| `window` | `int` | `2` | How many page links to show on each side of the current page |

Pages outside `current ± window` (other than the first and last page, which are always shown) are collapsed behind an `&hellip;` separator.

## Examples

```blade
<x-halo::pagination :current="3" :total="12" base-url="/users?page=:page" />

<x-halo::pagination :current="1" :total="5" base-url="/articles?page=:page" :window="1" />
```

## Accessibility

The wrapper is a `<nav aria-label="Pagination">` containing a `<ul>` of links. The current page link has `aria-current="page"`. The previous/next links are rendered as non-interactive `<span aria-disabled="true">` elements (rather than disabled `<a>` tags, which stay focusable and clickable) when there is no previous/next page.
