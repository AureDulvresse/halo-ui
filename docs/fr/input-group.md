---
layout: default
title: InputGroup
permalink: /fr/components/input-group/
lang: fr
---

# InputGroup

`resources/views/components/halo/input-group.blade.php`

## Props

InputGroup ne déclare aucune prop — c'est un simple conteneur statique qui accole visuellement un champ à une extension avant et/ou arrière.

| Slot | Notes |
|---|---|
| `$slot` (par défaut) | Le champ lui-même, ex. `<x-halo::input>` |
| `$leading` | Extension optionnelle rendue avant le champ (texte comme `$`, ou un bouton) |
| `$trailing` | Extension optionnelle rendue après le champ (texte comme `.com`, ou un bouton) |

Tout attribut supplémentaire (`class`, ...) passe tel quel sur le `<div>` englobant. Une `class` fournie surcharge les classes propres du composant pour la même famille d'utilitaires Tailwind (voir `halo_merge_classes()`).

## Exemples

```blade
<x-halo::input-group>
    <x-slot:leading>$</x-slot:leading>
    <x-halo::input name="amount" type="number" />
</x-halo::input-group>

<x-halo::input-group>
    <x-halo::input name="domain" placeholder="example" />
    <x-slot:trailing>.com</x-slot:trailing>
</x-halo::input-group>

<x-halo::input-group>
    <x-slot:leading>https://</x-slot:leading>
    <x-halo::input name="url" />
    <x-slot:trailing>
        <x-halo::button variant="ghost" size="sm" icon="copy" />
    </x-slot:trailing>
</x-halo::input-group>
```

## Accessibilité

Le conteneur applique `focus-within:ring-2 focus-within:ring-halo-ring`, si bien que tout le groupe se met en évidence visuellement quand le champ interne reçoit le focus, comme le style de focus d'un [Input](../input) autonome. La bordure, l'anneau et le rayon propres au champ imbriqué sont retirés via `[&_input]:border-0 [&_input]:ring-0 [&_input]:rounded-none` (et les équivalents `select`/`textarea`), si bien que seule la bordure externe du groupe est visible — pas de cas de double bordure à gérer.
