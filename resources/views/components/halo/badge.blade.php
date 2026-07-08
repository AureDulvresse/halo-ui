@props([
    'variant' => halo_default('badge', 'variant', 'secondary'),
])

@php
$classes = halo_variants([
    'base' => 'inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-xs font-medium border',
    'variants' => [
        'variant' => [
            'primary' => 'bg-halo-primary/10 text-halo-primary border-halo-primary/20',
            'secondary' => 'bg-halo-secondary text-halo-secondary-foreground border-transparent',
            'success' => 'bg-halo-success/10 text-halo-success border-halo-success/20',
            'danger' => 'bg-halo-danger/10 text-halo-danger border-halo-danger/20',
            'warning' => 'bg-halo-warning/10 text-halo-warning border-halo-warning/20',
        ],
    ],
    'defaults' => ['variant' => 'secondary'],
], compact('variant'), $attributes->get('class'));
@endphp

<span {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>{{ $slot }}</span>
