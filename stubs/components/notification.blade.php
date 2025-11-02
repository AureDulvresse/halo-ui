@props([
    'variant' => 'info',
    'title' => null,
    'dismissible' => true,
    'icon' => null,
    'glass' => false,
    'animate' => null,
])

@php
    $iconColor = match ($variant) {
        'success' => 'text-green-400',
        'danger' => 'text-red-400',
        'warning' => 'text-yellow-400',
        'info' => 'text-blue-400',
        default => 'text-gray-400',
    };

    $classes = trim(
        'border-l-4 p-4 rounded-r-lg shadow-sm ' .
            halo_classes('notification', $variant, null, $attributes->get('class')?? '', [
                'glass' => $glass,
                'animate' => $animate,
                'dark' => $glass && isset($attributes['dark']),
            ]),
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}
    @if ($dismissible) x-data="{ show: true }"
        x-show="show"
        x-transition @endif>
    <div class="flex items-start">
        @if ($icon)
            <div class="shrink-0 {{ $iconColor }}">
                <x-halo::icon :name="$icon" class="w-5 h-5" />
            </div>
        @endif

        <div class="ml-3 flex-1">
            @if ($title)
                <h3 class="text-sm font-medium text-gray-900">{{ $title }}</h3>
            @endif
            <div class="text-sm text-gray-700 {{ $title ? 'mt-1' : '' }}">
                {{ $slot }}
            </div>
        </div>

        @if ($dismissible)
            <button @click="show = false" class="ml-auto shrink-0 text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>
