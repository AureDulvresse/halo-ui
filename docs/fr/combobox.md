---
layout: default
title: Combobox
permalink: /fr/components/combobox/
lang: fr
---

# Combobox

`resources/views/components/halo/combobox/{index,option}.blade.php`

Un select consultable et filtrable : un champ texte qui filtre côté client une liste d'options rendue côté serveur au fur et à mesure de la saisie. Contrairement à [Select](../select), il n'y a pas de `<select>` natif — le filtrage, la sélection et la soumission de formulaire (optionnelle) sont entièrement gérés par Alpine, donc toutes les options doivent être rendues à l'avance (pas de chargement AJAX/dynamique).

## Props

`<x-halo::combobox>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `name` | `string` ou `null` | `null` | Si fourni, rend un `<input>` caché portant ce nom et contenant la valeur sélectionnée, pour qu'elle soit soumise avec le formulaire |
| `placeholder` | `string` | `"Select..."` (défaut config : `halo.defaults.combobox.placeholder`) | Placeholder du champ texte |
| `value` | `string` ou `null` | `null` | Valeur initialement sélectionnée |

`combobox.option` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `value` | `string` | *requis* | La valeur soumise/sélectionnée quand cette option est choisie |

Le slot par défaut de chaque option est son libellé visible.

## Exemples

```blade
<x-halo::combobox name="country" placeholder="Rechercher un pays...">
    <x-halo::combobox.option value="fr">France</x-halo::combobox.option>
    <x-halo::combobox.option value="de">Allemagne</x-halo::combobox.option>
    <x-halo::combobox.option value="jp">Japon</x-halo::combobox.option>
</x-halo::combobox>

{{-- présélectionné --}}
<x-halo::combobox name="country" value="de">
    <x-halo::combobox.option value="fr">France</x-halo::combobox.option>
    <x-halo::combobox.option value="de">Allemagne</x-halo::combobox.option>
</x-halo::combobox>
```

## Accessibilité

Le champ texte a `role="combobox"`, `aria-autocomplete="list"`, `aria-controls` pointant vers la listbox, et un `aria-expanded` en direct. Le panneau a `role="listbox"` et chaque option `role="option"`. Échap ferme le panneau, tout comme un clic à l'extérieur, selon le même modèle que [Popover](../popover) et [Dropdown](../dropdown).

Le support clavier est volontairement minimal dans cette version : taper filtre la liste, Entrée soumet le formulaire environnant comme d'habitude, et Échap ferme le panneau. La navigation complète au clavier entre options via les flèches (comme `Dropdown` le fait pour ses éléments de menu) n'est pas encore implémentée — associe ce composant à une sélection souris/tactile, ou contribue la gestion des flèches si tu en as besoin.

## Implémentation

Enregistré comme `Alpine.data('haloCombobox', ...)` dans `resources/js/init.js`. `matches(text, query)` est une vérification de sous-chaîne insensible à la casse utilisée par le `x-show` de chaque option ; `select(value, label)` fixe la valeur de l'input caché et le libellé visible, puis ferme le panneau.
