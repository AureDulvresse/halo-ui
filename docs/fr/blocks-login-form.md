---
layout: default
title: "Block : Formulaire de connexion"
permalink: /fr/blocks/login-form/
lang: fr
---

# Formulaire de connexion

Une carte de connexion centrée — [Layout: Auth](/fr/layout-auth) enveloppant une [Card](/fr/components/card) avec [Label](/fr/components/label), [Input](/fr/components/input) et [Button](/fr/components/button). Pas un composant à part entière : copie le balisage ci-dessous dans ton application et adapte-le librement, comme avec les blocks de shadcn/ui.

## Code

```blade
<x-halo::layout.auth>
    <x-slot:logo>Acme Inc.</x-slot:logo>

    <x-halo::card>
        <x-halo::card.header>Connexion</x-halo::card.header>

        <x-halo::card.body>
            <x-halo::label for="email">Email</x-halo::label>
            <x-halo::input id="email" name="email" type="email" icon="mail" placeholder="vous@exemple.com" />

            <x-halo::label for="password">Mot de passe</x-halo::label>
            <x-halo::input id="password" name="password" type="password" icon="lock" />
        </x-halo::card.body>

        <x-halo::card.footer>
            <x-halo::button class="w-full" type="submit">Se connecter</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>
</x-halo::layout.auth>
```
