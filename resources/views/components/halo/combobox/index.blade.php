@props([
    'name' => null,
    'placeholder' => halo_default('combobox', 'placeholder', 'Select...'),
    'value' => null,
])

@php
$listId = uniqid('halo-combobox-list-');

$classes = halo_merge_classes(
    'block w-full rounded-halo border border-halo-border bg-halo-background px-4 py-2 text-base text-halo-foreground placeholder:text-halo-foreground/50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring',
    $attributes->get('class'),
);
@endphp

<div x-data="haloCombobox(@js($value))" class="relative" @click.outside="close()" @keydown.escape="close()">
    @if($name)
        <input type="hidden" name="{{ $name }}" :value="selected">
    @endif

    <input
        type="text"
        role="combobox"
        aria-autocomplete="list"
        aria-controls="{{ $listId }}"
        autocomplete="off"
        placeholder="{{ $placeholder }}"
        :aria-expanded="open ? 'true' : 'false'"
        :value="open ? query : selectedLabel"
        @focus="openPanel()"
        @input="query = $event.target.value; open = true"
        {{ $attributes->except(['name', 'placeholder', 'value', 'class'])->merge(['class' => $classes]) }}
    />

    <ul
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition
        id="{{ $listId }}"
        role="listbox"
        class="absolute z-40 mt-1 max-h-60 w-full overflow-auto rounded-halo border border-halo-border bg-halo-background py-1 text-halo-foreground shadow-lg"
    >
        {{ $slot }}
    </ul>
</div>
