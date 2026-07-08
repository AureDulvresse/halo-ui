@props([
    'level' => 1,
    'size' => null,
])

@php
$level = max(1, min(6, (int) $level));
$tag = 'h'.$level;

$sizes = [
    1 => 'text-3xl font-bold tracking-tight',
    2 => 'text-2xl font-semibold tracking-tight',
    3 => 'text-xl font-semibold',
    4 => 'text-lg font-semibold',
    5 => 'text-base font-semibold',
    6 => 'text-sm font-semibold uppercase tracking-wide text-halo-foreground/70',
];

$classes = halo_merge_classes(
    'text-halo-foreground',
    $size ?? $sizes[$level],
    $attributes->get('class'),
);
@endphp

<{{ $tag }} {{ $attributes->except(['level', 'size', 'class'])->merge(['class' => $classes]) }}>{{ $slot }}</{{ $tag }}>
