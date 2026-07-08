---
layout: default
title: Kbd
permalink: /fr/components/kbd/
lang: fr
---

# Kbd

`resources/views/components/halo/kbd.blade.php`

Un petit élément en ligne pour afficher une touche de clavier ou un raccourci, par ex. dans un texte d'aide ou une [Tooltip](../tooltip).

## Props

Aucune hormis les attributs passés tels quels — tout (`class`, ...) atterrit sur l'élément natif `<kbd>`.

## Exemples

```blade
<p class="text-sm text-halo-foreground/80">
    Appuyez sur <x-halo::kbd>Ctrl</x-halo::kbd> + <x-halo::kbd>K</x-halo::kbd> pour ouvrir la palette de commandes.
</p>
```

## Accessibilité

Utilise l'élément natif `<kbd>`, déjà compris par les lecteurs d'écran et les navigateurs comme une "entrée clavier" — aucun ARIA supplémentaire n'est nécessaire.
