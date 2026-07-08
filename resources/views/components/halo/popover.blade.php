@props([
    'align' => halo_default('popover', 'align', 'left'),
])

@php
$alignClasses = [
    'left' => 'left-0',
    'right' => 'right-0',
];

$classes = halo_merge_classes(
    'absolute z-40 mt-2 min-w-[16rem] rounded-halo border border-halo-border bg-halo-background p-4 text-halo-foreground shadow-lg',
    $alignClasses[$align] ?? $alignClasses['left'],
    $attributes->get('class'),
);
@endphp

<div x-data="haloPopover()" class="relative inline-block" @keydown.escape="close()">
    <div @click="toggle()">
        {{ $trigger ?? '' }}
    </div>

    <div
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition
        @click.outside="close()"
        role="dialog"
        aria-modal="false"
        {{ $attributes->except(['align', 'class'])->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </div>
</div>
