@props([
    'size' => 'md',
    'src' => null,
    'alt' => 'Avatar',
    'fallback' => null,
    'shape' => 'circle',
    'glass' => false,
    'animate' => null,
])

@php
    $component = new \Halo\UI\Components\Avatar($size, $src, $alt, $fallback, $shape);

    $sizeClasses = match ($size) {
        'xs' => 'h-6 w-6 text-xs',
        'sm' => 'h-8 w-8 text-sm',
        'md' => 'h-10 w-10 text-base',
        'lg' => 'h-12 w-12 text-lg',
        'xl' => 'h-16 w-16 text-xl',
        '2xl' => 'h-24 w-24 text-2xl',
        default => 'h-10 w-10 text-base',
    };

    $shapeClasses = $shape === 'circle' ? 'rounded-full' : 'rounded-md';

    $classes = trim(
        'relative inline-block ' .
            $sizeClasses .
            ' ' .
            $shapeClasses .
            ' overflow-hidden ' .
            halo_classes('avatar', null, $size, $attributes->get('class') ?? '', [
                'glass' => $glass,
                'animate' => $animate,
                'dark' => $glass && isset($attributes['dark']),
            ]),
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if ($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover" />
    @else
        <div
            class="w-full h-full flex items-center justify-center bg-linear-to-br from-blue-500 to-purple-600 text-white font-semibold">
            {{ $component->getInitials() }}
        </div>
    @endif

    {{ $slot }}
</div>
