@props([
    'value' => '',
    'label' => '',
    'change' => null,
    'icon' => null,
    'variant' => 'default',
    'glass' => false,
    'animate' => null,
])

@php
    $classes = trim(
        'rounded-lg p-6 ' .
            halo_classes('stats', $variant, null, $attributes->get('class'), [
                'glass' => $glass,
                'animate' => $animate,
                'dark' => $glass && isset($attributes['dark']),
            ]),
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <div class="flex items-center justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-600">{{ $label }}</p>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $value }}</p>

            @if ($change)
                @php
                    $isPositive = str_starts_with($change, '+');
                    $changeClass = $isPositive ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100';
                @endphp
                <div class="flex items-center gap-1 mt-2">
                    <span
                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $changeClass }}">
                        @if ($isPositive)
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                        @else
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        @endif
                        {{ $change }}
                    </span>
                    <span class="text-xs text-gray-500">vs last period</span>
                </div>
            @endif
        </div>

        @if ($icon)
            <div class="w-16 h-16 bg-gradient-to-br {{ $variantClasses }} rounded-lg flex items-center justify-center">
                <x-icon :name="$icon" class="w-8 h-8 text-white" />
            </div>
        @endif
    </div>
</div>
