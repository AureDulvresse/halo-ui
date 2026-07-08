---
layout: default
title: Layout: Auth
permalink: /layout-auth/
---

# Layout: Auth

`resources/views/components/halo/layout/auth.blade.php`

A centered layout for login/register/forgot-password pages: an optional logo above a width-capped content area, vertically and horizontally centered. No JavaScript.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `maxWidth` | Tailwind max-width class | `max-w-sm` | Applied to the content wrapper |

Named slot: `logo`. Default slot: page content — typically a Card.

## Example

```blade
<x-halo::layout.auth>
    <x-slot:logo>
        <img src="/logo.svg" alt="Acme Inc." class="h-8" />
    </x-slot:logo>

    <x-halo::card>
        <x-halo::card.header>Sign in</x-halo::card.header>
        <x-halo::card.body>
            <x-halo::label for="email">Email</x-halo::label>
            <x-halo::input id="email" name="email" type="email" />
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button class="w-full">Sign in</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>
</x-halo::layout.auth>
```
