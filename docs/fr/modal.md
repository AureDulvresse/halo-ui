---
layout: default
title: Modal
permalink: /fr/components/modal/
lang: fr
---

# Modal

`resources/views/components/halo/modal/{index,header,body,footer}.blade.php`

Ouverte et fermée par son nom, depuis n'importe où — pas de prop `:open` à garder synchronisée entre un déclencheur et la modale.

## Props

`<x-halo::modal>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `name` | `string` | *requis* | Identifie cette modale pour les événements `open-modal`/`close-modal` |
| `size` | `sm`\|`md`\|`lg`\|`xl` | `md` | |

`modal.header`, `modal.body`, `modal.footer` n'ont pas de props au-delà des attributs passthrough.

## Exemples

```blade
<x-halo::button @click="$dispatch('open-modal', 'confirm-delete')">
    Supprimer le compte
</x-halo::button>

<x-halo::modal name="confirm-delete">
    <x-halo::modal.header>Supprimer le compte ?</x-halo::modal.header>

    <x-halo::modal.body>
        Cette action est irréversible.
    </x-halo::modal.body>

    <x-halo::modal.footer>
        <x-halo::button variant="outline" @click="$dispatch('close-modal')">Annuler</x-halo::button>
        <x-halo::button variant="danger">Supprimer</x-halo::button>
    </x-halo::modal.footer>
</x-halo::modal>
```

Émettre `close-modal` sans nom (ou avec un nom correspondant) ferme la ou les modales correspondantes. Échap et un clic sur le fond la ferment aussi.

## Accessibilité

Rend `role="dialog"` et `aria-modal="true"`. Le bouton de fermeture dans le coin a `aria-label="Close"`. Ouvrir la modale déplace le focus vers le premier élément focusable à l'intérieur (ou le panneau lui-même à défaut) ; `Tab`/`Shift+Tab` boucle à l'intérieur du panneau au lieu de s'échapper vers le reste de la page (un piège à focus, selon le [pattern WAI-ARIA dialog](https://www.w3.org/WAI/ARIA/apg/patterns/dialog-modal/)) ; la fermeture redonne le focus à ce qui l'avait avant l'ouverture.

Le panneau plafonne sa propre hauteur à `calc(100vh - 2rem)` et défile en interne (`overflow-y-auto`) — un contenu long défile dans la boîte de dialogue au lieu de la pousser hors écran sur les petits viewports (téléphones, orientation paysage).

## Implémentation

Enregistrée comme `Alpine.data('haloModal', ...)` dans `resources/js/init.js`, à l'écoute sur `window` des événements custom `open-modal`/`close-modal` correspondant à son `name`. Le panneau est référencé via `x-ref="panel"` pour que la logique de piège à focus (`focusFirst()`, `trapFocus()`) puisse interroger ses descendants focusables sans avoir besoin de connaître le contenu de la modale à l'avance.
