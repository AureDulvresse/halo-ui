@props([
    'name' => null,
    'size' => 'md',
])

@php
$sizes = [
    'xs' => 'w-3 h-3',
    'sm' => 'w-4 h-4',
    'md' => 'w-5 h-5',
    'lg' => 'w-6 h-6',
    'xl' => 'w-8 h-8',
];

$classes = halo_merge_classes($sizes[$size] ?? $sizes['md'], $attributes->get('class'));
@endphp

@if($name)
    <x-dynamic-component
        :component="'halo-' . $name"
        {{ $attributes->except(['name', 'size', 'class'])->merge(['class' => $classes, 'aria-hidden' => 'true']) }}
    />
@endif
