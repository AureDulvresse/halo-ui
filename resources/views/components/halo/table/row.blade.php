@props([
    'header' => false,
])

@php
$classes = halo_merge_classes(
    'border-b border-halo-border transition-colors last:border-0',
    $header ? null : 'hover:bg-halo-secondary/50',
    $attributes->get('class'),
);
@endphp

<tr {{ $attributes->except(['header', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</tr>
