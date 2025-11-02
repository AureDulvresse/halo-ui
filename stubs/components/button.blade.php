@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false,
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'left',
    'iconOnly' => false,
    'gradient' => false,
    'glow' => false,
    'glass' => false,
    'animate' => null,
])

@php
    $disabled = $disabled || $loading;

    $classes = halo_classes('button', $variant, $size, $attributes->get('class'), [
        'gradient' => $gradient,
        'glow' => $glow,
        'glass' => $glass,
        'animate' => $animate,
        'dark' => $glass && isset($attributes['dark']),
    ]);

    $baseClasses =
        'inline-flex items-center justify-center border focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all rounded-md disabled:opacity-50 disabled:cursor-not-allowed';

    $iconSize = match ($size) {
        'xs' => '3',
        'sm' => '4',
        'md' => '4',
        'lg' => '5',
        'xl' => '6',
        default => '4',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $classes]) }}
    @disabled($disabled)>
    @if ($loading)
        <x-halo-spinner :size="$iconSize" class="-ml-0.5 mr-2" />
    @elseif($icon && $iconPosition === 'left')
        <x-halo-icon :name="$icon" class="w-{{ $iconSize }} h-{{ $iconSize }} -ml-0.5 mr-2" />
    @endif

    @unless ($iconOnly)
        <span>{{ $slot }}</span>
    @endunless

    @if ($icon && $iconPosition === 'right' && !$loading)
        <x-halo-icon :name="$icon" class="w-{{ $iconSize }} h-{{ $iconSize }} ml-2 -mr-0.5" />
    @endif
</button>
