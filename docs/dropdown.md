# Dropdown

Simple dropdown component that accepts trigger/content slots. Uses `HaloUI.dropdown()` Alpine store when included in compiled JS.

Example:

```blade
<x-halo::dropdown>
  <x-slot name="trigger">
    <x-halo::button>Open</x-halo::button>
  </x-slot>
  <x-halo::dropdown.item href="#">Profile</x-halo::dropdown.item>
</x-halo::dropdown>
```
