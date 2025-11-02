@props([
    'label' => null,
    'position' => 'center',
    'variant' => 'default',
    'glass' => false,
    'animate' => null,
])

@php
    $positionClasses = match ($position) {
        'left' => 'justify-start',
        'right' => 'justify-end',
        default => 'justify-center',
    };

    $classes = halo_classes('divider', $variant, null, $attributes->get('class'), [
        'glass' => $glass,
        'animate' => $animate,
        'dark' => $glass && isset($attributes['dark']),
    ]);
@endphp

@if ($label)
    <div class="relative flex items-center {{ $positionClasses }} {{ $classes }}">
        <div class="grow border-t {{ $classes }}"></div>
        <span class="shrink-0 mx-4 text-sm"
            :class="{ 'text-white': glass, 'text-gray-600 dark:text-gray-300': !glass }">{{ $label }}</span>
        <div class="grow border-t {{ $classes }}"></div>
    </div>
@else
    <hr {{ $attributes->merge(['class' => $classes]) }} />
@endif
