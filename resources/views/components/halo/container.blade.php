@props([
    'size' => 'default', // 'sm', 'default', 'lg', 'xl', 'full'
])

@php
$sizeClass = match($size) {
    'sm' => 'max-w-3xl',
    'default' => 'max-w-5xl',
    'lg' => 'max-w-7xl',
    'xl' => 'max-w-screen-2xl',
    'full' => 'max-w-full',
    default => 'max-w-5xl',
};

$classes = halo_merge_classes(
    "mx-auto px-4 sm:px-6 lg:px-8 {$sizeClass}",
    $attributes->get('class')
);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
