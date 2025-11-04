@props([
    'max' => 4,
    'size' => 'md',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-12 h-12',
        default => 'w-10 h-10',
    };
@endphp

<div {{ $attributes->merge(['class' => 'flex -space-x-2']) }}>
    {{ $slot }}
</div>