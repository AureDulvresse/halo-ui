@props([
    'variant' => 'primary',
    'size' => 'md',
    'dot' => false,
    'glass' => false,
    'animate' => null,
])

@php
    // preserve existing color/size mapping for dot but prefer halo_classes for wrapper
    $dotColor = match ($variant) {
        'primary' => 'bg-blue-500',
        'secondary' => 'bg-gray-500',
        'success' => 'bg-green-500',
        'danger' => 'bg-red-500',
        'warning' => 'bg-yellow-500',
        'info' => 'bg-cyan-500',
        default => 'bg-blue-500',
    };

    // Compose classes using halo_classes while keeping sensible defaults
    $classes = trim(
        'inline-flex items-center gap-1.5 font-medium rounded-full ' .
            halo_classes('badge', $variant, $size, $attributes->get('class'), [
                'glass' => $glass,
                'animate' => $animate,
                'dark' => $glass && isset($attributes['dark']),
            ]),
    );
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if ($dot)
        <span class="w-1.5 h-1.5 rounded-full {{ $dotColor }}"></span>
    @endif
    {{ $slot }}
</span>
