---
layout: default
title: Layout: Base
permalink: /layout-base/
---

# Layout: Base

`resources/views/components/halo/layout/base.blade.php`

A full HTML document skeleton — `<!DOCTYPE html>` through `</html>` — wired to `@haloStyles`/`@haloScripts` already. The fastest way to get a Laravel view rendering with HaloUI: wrap your page content in this and nothing else needs configuring.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `title` | `string` | `config('app.name')` | Rendered in `<title>` |
| `theme` | `string` | `config('halo.theme.default')` | Rendered as `<html data-theme="...">` |

Named slots: `head` (extra `<head>` content — meta tags, a favicon link), `scripts` (extra end-of-body scripts). Default slot: page body.

## Example

```blade
<x-halo::layout.base title="Dashboard">
    <x-slot:head>
        <meta name="description" content="Account dashboard">
    </x-slot:head>

    <x-halo::layout.container>
        <x-halo::layout.page-header title="Dashboard" />
        {{-- page content --}}
    </x-halo::layout.container>
</x-halo::layout.base>
```

## Notes

If your app already has its own root layout (extending a shared `<html>` skeleton, injecting analytics scripts, etc.), use that instead and just add `@haloStyles`/`@haloScripts` to it directly — this component exists for the common case of a small app or a fresh install that doesn't have one yet.
