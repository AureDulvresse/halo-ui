@props([
    'current' => 1,
])

@php
$classes = halo_merge_classes('flex items-center', $attributes->get('class'));
@endphp

<ol x-data="haloStepper({{ (int) $current }})" {{ $attributes->except(['current', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</ol>
