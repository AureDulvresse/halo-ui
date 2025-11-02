@props([
    'value' => 0,
    'max' => 100,
    'size' => 'md',
    'variant' => 'primary',
    'showLabel' => false,
    'striped' => false,
    'animated' => false,
    'glass' => false,
    'animate' => null,
])

@php
    $component = new \Halo\UI\Components\Progress($value, $max, $size, $variant, $showLabel, $striped, $animated);
    $percentage = $component->percentage();

    $classes = trim(
        halo_classes('progress', $variant, $size, $attributes->get('class'), [
            'glass' => $glass,
            'animate' => $animate,
            'striped' => $striped,
            'animated' => $animated,
            'dark' => $glass && isset($attributes['dark']),
        ]),
    );

    $stripedClasses = $striped
        ? 'bg-gradient-to-r from-transparent via-white/20 to-transparent bg-[length:2rem_100%]'
        : '';
    $animatedClasses = $animated ? 'animate-progress-stripes' : '';
@endphp

<div class="w-full">
    @if ($showLabel)
        <div class="flex justify-between items-center mb-1">
            <span class="text-sm font-medium text-gray-700">{{ $slot }}</span>
            <span class="text-sm font-medium text-gray-700">{{ $percentage }}%</span>
        </div>
    @endif

    <div {{ $attributes->merge(['class' => "w-full bg-gray-200 rounded-full overflow-hidden {$sizeClasses}"]) }}>
        <div class="{{ $variantClasses }} {{ $stripedClasses }} {{ $animatedClasses }} transition-all duration-300 ease-in-out rounded-full h-full"
            style="width: {{ $percentage }}%"></div>
    </div>
</div>
