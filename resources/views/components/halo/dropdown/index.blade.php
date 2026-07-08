@props([
    'align' => 'left',
])

@php
$alignClasses = [
    'left' => 'left-0',
    'right' => 'right-0',
];

$classes = halo_merge_classes(
    'absolute z-40 mt-2 min-w-[10rem] max-h-80 overflow-y-auto rounded-halo border border-halo-border bg-halo-background text-halo-foreground shadow-lg py-1',
    $alignClasses[$align] ?? $alignClasses['left'],
    $attributes->get('class'),
);
@endphp

<div x-data="haloDropdown()" class="relative inline-block" @keydown.escape="close()">
    <div @click="toggle()">
        {{ $trigger ?? '' }}
    </div>

    <div
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition
        @click.outside="close()"
        @click="closeOnItemClick($event)"
        @keydown.down.prevent="focusNext()"
        @keydown.up.prevent="focusPrevious()"
        role="menu"
        {{ $attributes->except(['align', 'class'])->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </div>
</div>
