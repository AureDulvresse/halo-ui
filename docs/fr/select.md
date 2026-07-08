---
layout: default
title: Select
permalink: /fr/components/select/
lang: fr
---

# Select

`resources/views/components/halo/select/{index,item}.blade.php`

Un bouton déclencheur au style personnalisé plus un panneau `role="listbox"` d'options `select.item` — pas un `<select>` natif. Un navigateur affiche lui-même le popup d'options d'un `<select>` natif, et ce popup ne peut pas être restylé pour matcher un champ thémé et arrondi (avec le thème Luma et ses champs en forme de pilule, le popup natif restait un simple menu déroulant système carré). Un `<input type="hidden">` reflète la valeur sélectionnée pour que ça continue de se soumettre avec un formulaire.

## Props

`select.index` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `size` | `sm`\|`md`\|`lg` | `md` | Défaut config : `halo.defaults.select.size` |
| `options` | `array<value, label>` ou `null` | `null` | Rend des enfants `select.item` ; retombe sur le slot si omis |
| `value` | `string` ou `null` | `null` | Valeur sélectionnée initiale. Quand elle correspond à une clé de `options`, le libellé du déclencheur est résolu côté serveur pour être correct dès le premier rendu, avant qu'Alpine démarre |
| `placeholder` | `string` | `"Select..."` | Affiché sur le déclencheur quand rien n'est sélectionné |
| `name` | `string` ou `null` | `null` | Si fourni, rend un `<input type="hidden">` lié à la valeur sélectionnée, pour qu'elle se soumette avec un formulaire |
| `invalid` | `bool` | `false` | Pose `aria-invalid="true"` sur le déclencheur. Impliqué par `error` |
| `disabled` | `bool` | `false` | |
| `id` | `string` ou `null` | auto-généré | Retombe sur `name`, puis un id aléatoire |
| `error` | `string` ou `null` | `null` | Affiche un message sous le champ, relié via `aria-describedby`, et implique `invalid` |

`select.item` :

| Prop | Type | Notes |
|---|---|---|
| `value` | `string` | Requis. La valeur que représente cette option |

## Exemples

```blade
<x-halo::select name="country" :options="['fr' => 'France', 'us' => 'États-Unis']" value="fr" />

<x-halo::select name="country" placeholder="Choisis un pays">
    <x-halo::select.item value="fr">France</x-halo::select.item>
    <x-halo::select.item value="us">États-Unis</x-halo::select.item>
</x-halo::select>

<x-halo::select name="country" error="Choisis un pays" />
```

## Accessibilité

Le déclencheur est un vrai `<button>` avec `aria-haspopup="listbox"` et `aria-expanded` reflétant l'état ouvert/fermé. Le panneau utilise `role="listbox"`, chaque option `role="option"` avec `aria-selected`. Les flèches déplacent le focus entre les options (pattern WAI-ARIA listbox) ; Entrée ou un clic sélectionne l'option focus ; Échap ou un clic à l'extérieur ferme le panneau et rend le focus au déclencheur.

## Implémentation

Enregistrée comme `Alpine.data('haloSelect', (initialValue, initialLabel) => ...)` dans `resources/js/init.js`.
