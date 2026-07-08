@props([
    'value',
])

@php
$classes = halo_merge_classes(
    'inline-flex items-center justify-center gap-2 px-3 py-1.5 text-sm font-medium text-halo-foreground transition-colors hover:bg-halo-secondary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring focus-visible:ring-inset disabled:opacity-50 disabled:cursor-not-allowed',
    $attributes->get('class'),
);
@endphp

<button
    type="button"
    @click="select('{{ $value }}')"
    :aria-pressed="isSelected('{{ $value }}').toString()"
    :class="isSelected('{{ $value }}') ? 'bg-halo-primary text-halo-primary-foreground' : ''"
    {{ $attributes->except(['value', 'class'])->merge(['class' => $classes]) }}
>
    {{ $slot }}
</button>
