@props([
    'name' => null,
])

@php
$iconSet = config('halo.icons.set', 'halo');
$defaultClass = config('halo.icons.default_class', 'w-5 h-5');
$classes = halo_merge_classes($defaultClass, $attributes->get('class'));
@endphp

@if($name)
    <x-dynamic-component
        :component="'icon-' . $iconSet"
        :name="$name"
        {{ $attributes->merge(['class' => $classes]) }}
    />
@endif
