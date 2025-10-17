@props([
    'size' => 'md',
    'placeholder' => '',
])

@php
    $sizes = [
        'sm' => 'px-2 py-1 text-sm',
        'md' => 'px-3 py-2 text-base',
        'lg' => 'px-4 py-3 text-lg',
    ];
@endphp

<textarea placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => "border rounded-md text-[var(--color-text)] bg-[var(--color-background)] focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] {$sizes[$size]}"]) }}>
</textarea>
