@props([
    'direction' => 'vertical',
    'gap' => '4',
    'align' => 'stretch',
    'justify' => 'start',
])

@php
    $directionClass = $direction === 'horizontal' ? 'flex-row' : 'flex-col';
    $gapClass = "gap-{$gap}";

    $alignClass = match ($align) {
        'start' => 'items-start',
        'center' => 'items-center',
        'end' => 'items-end',
        'stretch' => 'items-stretch',
        default => 'items-stretch',
    };

    $justifyClass = match ($justify) {
        'start' => 'justify-start',
        'center' => 'justify-center',
        'end' => 'justify-end',
        'between' => 'justify-between',
        'around' => 'justify-around',
        default => 'justify-start',
    };

    $classes = halo_merge_classes(
        "flex {$directionClass} {$gapClass} {$alignClass} {$justifyClass}",
        $attributes->get('class'),
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
