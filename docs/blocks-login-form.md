---
layout: default
title: "Block: Login Form"
permalink: /blocks/login-form/
---

# Login Form

A centered sign-in card — [Layout: Auth](/layout-auth) wrapping a [Card](/components/card) with [Label](/components/label), [Input](/components/input), and [Button](/components/button). Not a component of its own: copy the markup below into your app and adjust freely, the same way you would with shadcn/ui's blocks.

## Code

```blade
<x-halo::layout.auth>
    <x-slot:logo>Acme Inc.</x-slot:logo>

    <x-halo::card>
        <x-halo::card.header>Sign in</x-halo::card.header>

        <x-halo::card.body>
            <x-halo::label for="email">Email</x-halo::label>
            <x-halo::input id="email" name="email" type="email" icon="mail" placeholder="you@example.com" />

            <x-halo::label for="password">Password</x-halo::label>
            <x-halo::input id="password" name="password" type="password" icon="lock" />
        </x-halo::card.body>

        <x-halo::card.footer>
            <x-halo::button class="w-full" type="submit">Sign in</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>
</x-halo::layout.auth>
```
