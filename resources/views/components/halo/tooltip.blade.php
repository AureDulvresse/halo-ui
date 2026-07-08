@props([
    'position' => halo_default('tooltip', 'position', 'top'),
])

@php
$id = 'halo-tooltip-'.uniqid();

$positions = [
    'top' => 'bottom-full left-1/2 mb-2 -translate-x-1/2',
    'bottom' => 'top-full left-1/2 mt-2 -translate-x-1/2',
    'left' => 'right-full top-1/2 mr-2 -translate-y-1/2',
    'right' => 'left-full top-1/2 ml-2 -translate-y-1/2',
];

$classes = halo_merge_classes(
    'absolute z-50 whitespace-nowrap rounded-halo bg-halo-foreground px-2 py-1 text-xs text-halo-background shadow-md',
    $positions[$position] ?? $positions['top'],
    $attributes->get('class'),
);
@endphp

<div
    x-data="haloTooltip('{{ $id }}')"
    class="relative inline-block"
    @mouseenter="show()"
    @mouseleave="hide()"
    @focusin="show()"
    @focusout="hide()"
>
    <div x-ref="trigger">
        {{ $trigger ?? '' }}
    </div>

    <div
        id="{{ $id }}"
        x-show="open"
        x-cloak
        x-transition
        role="tooltip"
        {{ $attributes->except(['position', 'class'])->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </div>
</div>
