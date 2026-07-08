@props([
    'href' => null,
])

@php
$classes = halo_merge_classes(
    'block w-full text-left px-4 py-2 text-sm text-halo-foreground hover:bg-halo-secondary',
    $attributes->get('class'),
);
@endphp

@if($href)
    <a href="{{ $href }}" role="menuitem" {{ $attributes->except(['href', 'class'])->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="button" role="menuitem" {{ $attributes->except(['href', 'class'])->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
