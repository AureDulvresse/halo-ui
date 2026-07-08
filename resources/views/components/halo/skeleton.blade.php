@props([
    'variant' => halo_default('skeleton', 'variant', 'rectangle'),
])

@php
$classes = halo_variants([
    'base' => 'animate-pulse bg-halo-secondary',
    'variants' => [
        'variant' => [
            'text' => 'h-4 rounded',
            'circle' => 'rounded-full aspect-square',
            'rectangle' => 'rounded-halo',
        ],
    ],
    'defaults' => ['variant' => 'rectangle'],
], compact('variant'), $attributes->get('class'));
@endphp

<div
    role="status"
    aria-label="Loading"
    {{ $attributes->except(['variant', 'class'])->merge(['class' => $classes]) }}
></div>
