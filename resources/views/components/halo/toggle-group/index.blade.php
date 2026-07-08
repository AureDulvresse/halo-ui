@props([
    'type' => 'single',
    'value' => null,
])

@php
$initial = $value ?? ($type === 'multiple' ? [] : null);

$classes = halo_merge_classes(
    'inline-flex items-stretch rounded-halo border border-halo-border overflow-hidden divide-x divide-halo-border',
    $attributes->get('class'),
);
@endphp

<div
    role="group"
    x-data="haloToggleGroup('{{ $type }}', {{ json_encode($initial) }})"
    {{ $attributes->except(['type', 'value', 'class'])->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
