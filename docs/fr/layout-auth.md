---
layout: default
title: "Layout : Auth"
permalink: /fr/layout-auth/
lang: fr
---

# Layout : Auth

`resources/views/components/halo/layout/auth.blade.php`

Un layout centré pour les pages de connexion/inscription/mot de passe oublié : un logo optionnel au-dessus d'une zone de contenu à largeur limitée, centrée verticalement et horizontalement. Pas de JavaScript.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `maxWidth` | Classe Tailwind de largeur max | `max-w-sm` | Appliquée au conteneur de contenu |

Slot nommé : `logo`. Slot par défaut : le contenu de la page — typiquement une Card.

## Exemple

```blade
<x-halo::layout.auth>
    <x-slot:logo>
        <img src="/logo.svg" alt="Acme Inc." class="h-8" />
    </x-slot:logo>

    <x-halo::card>
        <x-halo::card.header>Connexion</x-halo::card.header>
        <x-halo::card.body>
            <x-halo::label for="email">Email</x-halo::label>
            <x-halo::input id="email" name="email" type="email" />
        </x-halo::card.body>
        <x-halo::card.footer>
            <x-halo::button class="w-full">Se connecter</x-halo::button>
        </x-halo::card.footer>
    </x-halo::card>
</x-halo::layout.auth>
```
