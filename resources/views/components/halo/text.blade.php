@props([
    'as' => 'p',
    'size' => 'base',
    'muted' => false,
])

@php
// Whitelisted rather than echoing $as verbatim — it's a developer-supplied
// prop, not request input, but there's no reason to allow an arbitrary tag
// name onto the page when a handful of text-level elements cover every real
// use case.
$allowedTags = ['p', 'span', 'div', 'blockquote'];
$tag = in_array($as, $allowedTags, true) ? $as : 'p';

$sizes = [
    'xs' => 'text-xs',
    'sm' => 'text-sm',
    'base' => 'text-base',
    'lg' => 'text-lg',
];

$classes = halo_merge_classes(
    $sizes[$size] ?? $sizes['base'],
    $muted ? 'text-halo-foreground/60' : 'text-halo-foreground',
    $attributes->get('class'),
);
@endphp

<{{ $tag }} {{ $attributes->except(['as', 'size', 'muted', 'class'])->merge(['class' => $classes]) }}>{{ $slot }}</{{ $tag }}>
