@props([
    'cols' => 3,
    'gap' => '6',
    'responsive' => true,
])

@php
    $colsClass = $responsive ? "grid-cols-1 sm:grid-cols-2 lg:grid-cols-{$cols}" : "grid-cols-{$cols}";

    $gapClass = "gap-{$gap}";

    $classes = halo_merge_classes("grid {$colsClass} {$gapClass}", $attributes->get('class'));
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
