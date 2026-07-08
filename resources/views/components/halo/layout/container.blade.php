@props([
    'size' => 'lg',
])

@php
$sizes = [
    'sm' => 'max-w-3xl',
    'md' => 'max-w-5xl',
    'lg' => 'max-w-6xl',
    'xl' => 'max-w-7xl',
    'full' => 'max-w-none',
];

$classes = halo_merge_classes(
    'mx-auto w-full px-4 sm:px-6 lg:px-8',
    $sizes[$size] ?? $sizes['lg'],
    $attributes->get('class'),
);
@endphp

<div {{ $attributes->except(['size', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
