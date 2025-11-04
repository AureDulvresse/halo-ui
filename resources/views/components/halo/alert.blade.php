@props([
    'variant' => halo_default('alert', 'variant', 'info'),
    'dismissible' => halo_default('alert', 'dismissible', false),
    'icon' => null,
])

@php
$baseClasses = 'flex items-start gap-3 p-4 border';
$variantClasses = halo_classes('alert', $variant);
$radiusClass = theme('radius.md', 'rounded-md');

$iconMap = [
    'info' => 'information-circle',
    'success' => 'check-circle',
    'warning' => 'exclamation-triangle',
    'danger' => 'exclamation-circle',
];

$defaultIcon = $icon ?? ($iconMap[$variant] ?? 'information-circle');

$classes = halo_merge_classes(
    "{$baseClasses} {$variantClasses} {$radiusClass}",
    $attributes->get('class')
);
@endphp

<div
    {{ $attributes->merge(['class' => $classes]) }}
    role="alert"
    @if($dismissible)
        x-data="{ show: true }"
        x-show="show"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
>
    <!-- Icon -->
    <div class="flex-shrink-0">
        <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$defaultIcon" class="w-5 h-5" />
    </div>

    <!-- Content -->
    <div class="flex-1 text-sm">
        {{ $slot }}
    </div>

    <!-- Dismiss Button -->
    @if($dismissible)
        <button
            type="button"
            @click="show = false"
            class="flex-shrink-0 ml-auto -mr-1 -mt-1 p-1 rounded-md hover:bg-black/5 transition-colors"
            aria-label="Dismiss"
        >
            <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" name="x" class="w-4 h-4" />
        </button>
    @endif
</div>
