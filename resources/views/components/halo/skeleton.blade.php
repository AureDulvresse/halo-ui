@props([
    'variant' => 'text',
    'width' => null,
    'height' => null,
    'animated' => true,
    'glass' => false,
    'animate' => null,
])

@php
    $customStyles = '';
    if ($width) {
        $customStyles .= "width: {$width}; ";
    }
    if ($height) {
        $customStyles .= "height: {$height};";
    }

    $classes = trim(
        'bg-gray-200 dark:bg-gray-700 ' .
            halo_classes('skeleton', $variant, null, $attributes->get('class'), [
                'glass' => $glass,
                'animate' => $animate,
                'animated' => $animated,
                'dark' => $glass && isset($attributes['dark']),
            ]),
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}
    @if ($customStyles) style="{{ $customStyles }}" @endif></div>
