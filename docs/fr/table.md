---
layout: default
title: Table
permalink: /fr/components/table/
lang: fr
---

# Table

`resources/views/components/halo/table/{index,row,head,cell}.blade.php`

Des enveloppes stylées autour des éléments natifs `<table>`/`<tr>`/`<th>`/`<td>` — `<thead>`/`<tbody>` restent du HTML brut (ils sont structurels, pas stylistiques) et reçoivent leurs lignes/cellules des composants ci-dessous.

Pas de JavaScript — tri, pagination et sélection sont laissés à l'application consommatrice, puisqu'ils impliquent tous un flux de données propre à l'app qu'un composant générique ne peut pas présumer.

## Props

`table.row` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `header` | `bool` | `false` | Désactive le surlignage au survol — à poser sur les lignes dans `<thead>` |

`table.index`, `table.head`, `table.cell` n'ont pas de props au-delà des attributs passthrough.

## Exemple

```blade
<x-halo::table>
    <thead>
        <x-halo::table.row header>
            <x-halo::table.head>Nom</x-halo::table.head>
            <x-halo::table.head>Email</x-halo::table.head>
            <x-halo::table.head>Rôle</x-halo::table.head>
        </x-halo::table.row>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <x-halo::table.row>
                <x-halo::table.cell>{{ $user->name }}</x-halo::table.cell>
                <x-halo::table.cell>{{ $user->email }}</x-halo::table.cell>
                <x-halo::table.cell><x-halo::badge>{{ $user->role }}</x-halo::badge></x-halo::table.cell>
            </x-halo::table.row>
        @endforeach
    </tbody>
</x-halo::table>
```

## Accessibilité

`table.head` rend `<th scope="col">` — les lecteurs d'écran annoncent l'en-tête de colonne en naviguant dans une cellule de cette colonne. Utilise une vraie `<caption>` (HTML brut, dans `<x-halo::table>`) si la table a besoin d'une description textuelle au-delà d'un `<x-halo::heading>` précédent.
