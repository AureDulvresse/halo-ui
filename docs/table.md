---
layout: default
title: Table
permalink: /components/table/
---

# Table

`resources/views/components/halo/table/{index,row,head,cell}.blade.php`

Styled wrappers around the native `<table>`/`<tr>`/`<th>`/`<td>` elements — `<thead>`/`<tbody>` stay plain HTML (they're structural, not stylistic) and get their rows/cells from the components below.

No JavaScript — sorting, pagination, and selection are left to the consuming app, since they all involve app-specific data flow that a generic component can't assume.

## Props

`table.row`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `header` | `bool` | `false` | Skips the row-hover highlight — set on rows inside `<thead>` |

`table.index`, `table.head`, `table.cell` take no props beyond pass-through attributes.

## Example

```blade
<x-halo::table>
    <thead>
        <x-halo::table.row header>
            <x-halo::table.head>Name</x-halo::table.head>
            <x-halo::table.head>Email</x-halo::table.head>
            <x-halo::table.head>Role</x-halo::table.head>
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

## Accessibility

`table.head` renders `<th scope="col">` — screen readers announce the column header when navigating into a cell in that column. Use a real `<caption>` (plain HTML, inside `<x-halo::table>`) if the table needs a text description beyond a preceding `<x-halo::heading>`.
