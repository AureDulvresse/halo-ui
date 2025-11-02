@props([
    'size' => 'md',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'px-1.5 py-0.5 text-xs',
        'md' => 'px-2 py-1 text-sm',
        'lg' => 'px-2.5 py-1.5 text-base',
        default => 'px-2 py-1 text-sm',
    };
@endphp

<kbd {{ $attributes->merge(['class' => "inline-flex items-center justify-center font-mono font-semibold bg-gray-100 border border-gray-300 rounded shadow-sm {$sizeClasses}"]) }}>
    {{ $slot }}
</kbd>