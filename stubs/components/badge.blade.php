@props([
    'variant' => 'primary',
])

@php
    $colors = [
        'primary' => 'bg-[var(--color-primary)] text-white',
        'danger' => 'bg-[var(--color-danger)] text-white',
        'secondary' => 'bg-[var(--color-secondary)] text-white',
    ];
@endphp

<span
    {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {$colors[$variant]}"]) }}>{{ $slot }}</span>
