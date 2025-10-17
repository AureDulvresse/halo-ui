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

<div {{ $attributes->merge(['class' => "rounded-md p-4 {$colors[$variant]}"]) }}>{{ $slot }}</div>
