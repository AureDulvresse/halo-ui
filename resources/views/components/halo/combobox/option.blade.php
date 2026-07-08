@props([
    'value',
])

@php
$classes = halo_merge_classes(
    'cursor-pointer select-none px-4 py-2 text-sm text-halo-foreground hover:bg-halo-secondary',
    $attributes->get('class'),
);
@endphp

<li
    role="option"
    data-value="{{ $value }}"
    @click="select('{{ $value }}', $el.textContent.trim())"
    x-show="matches($el.textContent, query)"
    {{ $attributes->except(['value', 'class'])->merge(['class' => $classes]) }}
>
    {{ $slot }}
</li>
