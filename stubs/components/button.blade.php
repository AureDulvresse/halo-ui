@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];
    $variants = [
        'primary' => 'bg-[var(--color-primary)] text-white hover:bg-[var(--color-primary-hover)]',
        'secondary' => 'bg-[var(--color-secondary)] text-white hover:bg-[var(--color-secondary-hover)]',
        'danger' => 'bg-[var(--color-danger)] text-white hover:bg-[var(--color-danger-hover)]',
        'outline' =>
            'bg-transparent border border-[var(--color-border)] text-[var(--color-text)] hover:bg-[var(--color-hover)]',
    ];
@endphp

<button
    x-data
    @click="$el.classList.toggle('scale-95'); setTimeout(() => $el.classList.remove('scale-95'), 100)"
    {{ $attributes->merge(['class' => "rounded-md font-medium transition transform active:scale-95 {$sizes[$size]} {$variants[$variant]}"]) }}>
    {{ $slot }}
</button>
