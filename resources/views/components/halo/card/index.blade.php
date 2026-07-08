@props([
    'variant' => halo_default('card', 'variant', 'default'),
])

@php
$classes = halo_variants([
    'base' => 'rounded-halo border bg-halo-background text-halo-foreground',
    'variants' => [
        'variant' => [
            'default' => 'border-halo-border',
            'bordered' => 'border-halo-border border-2',
            'elevated' => 'border-transparent shadow-lg',
        ],
    ],
    'defaults' => ['variant' => 'default'],
], compact('variant'), $attributes->get('class'));
@endphp

<div {{ $attributes->except(['variant', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
