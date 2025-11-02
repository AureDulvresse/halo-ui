@props([
    'variant' => 'default',
    'interactive' => false,
    'glass' => false,
    'gradient' => false,
    'glow' => false,
    'animate' => null,
])

@php
    $classes = halo_classes('card', $variant, null, $attributes->get('class') ?? '', [
        'glass' => $glass,
        'gradient' => $gradient,
        'glow' => $glow,
        'animate' => $animate,
        'dark' => $glass && isset($attributes['dark']),
    ]);

    $baseClasses = 'rounded-lg overflow-hidden transition-all duration-300';

    if ($interactive) {
        $baseClasses .= ' hover:scale-[1.02] hover:shadow-lg cursor-pointer';
    }
@endphp

<div {{ $attributes->merge(['class' => $baseClasses . ' ' . $classes]) }}>
    {{ $slot }}
</div>
