@props([
    'height' => null,
])

@php
$classes = halo_merge_classes('overflow-auto halo-scroll-area max-h-full', $attributes->get('class'));
@endphp

<div
    {{ $attributes->except(['height', 'class'])->merge(['class' => $classes]) }}
    @if($height) style="max-height: {{ $height }}" @endif
>
    {{ $slot }}
</div>
