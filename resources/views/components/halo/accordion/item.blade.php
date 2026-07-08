@props([
    'title',
    'name' => null,
])

@php
$itemName = $name ?? uniqid('halo-accordion-item-');
@endphp

<div {{ $attributes->except(['title', 'name', 'class'])->merge(['class' => halo_merge_classes($attributes->get('class'))]) }}>
    <button
        type="button"
        @click="toggle('{{ $itemName }}')"
        :aria-expanded="isOpen('{{ $itemName }}') ? 'true' : 'false'"
        class="flex w-full items-center justify-between gap-2 px-4 py-3 text-left text-sm font-medium text-halo-foreground transition-colors hover:bg-halo-secondary active:bg-halo-secondary/80 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring focus-visible:ring-inset"
    >
        {{ $title }}
        {{-- ::style (double colon) is required here, not :style — <x-halo::icon> is a
             real Blade component tag, so a single-colon attribute is evaluated as PHP
             immediately (and "isOpen" isn't a PHP function). The double colon tells
             Blade to emit it as a literal attribute instead, so Alpine binds it client-side. --}}
        <x-halo::icon
            name="chevron-down"
            size="sm"
            class="shrink-0 transition-transform"
            ::style="isOpen('{{ $itemName }}') ? 'transform: rotate(180deg)' : ''"
        />
    </button>

    <div x-show="isOpen('{{ $itemName }}')" x-transition class="px-4 py-3 text-sm text-halo-foreground/80">
        {{ $slot }}
    </div>
</div>
