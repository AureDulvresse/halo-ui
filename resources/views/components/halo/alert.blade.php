@props([
    'variant' => halo_default('alert', 'variant', 'info'),
    'dismissible' => false,
    'icon' => null,
])

@php
$icons = [
    'info' => 'information-circle',
    'success' => 'check-circle',
    'warning' => 'exclamation-triangle',
    'danger' => 'exclamation-circle',
];

$resolvedIcon = $icon ?? ($icons[$variant] ?? null);

$classes = halo_variants([
    'base' => 'flex items-start gap-3 rounded-halo border px-4 py-3 text-sm',
    'variants' => [
        'variant' => [
            'info' => 'bg-halo-info/10 text-halo-info border-halo-info/20',
            'success' => 'bg-halo-success/10 text-halo-success border-halo-success/20',
            'warning' => 'bg-halo-warning/10 text-halo-warning border-halo-warning/20',
            'danger' => 'bg-halo-danger/10 text-halo-danger border-halo-danger/20',
        ],
    ],
    'defaults' => ['variant' => 'info'],
], compact('variant'), $attributes->get('class'));
@endphp

<div
    role="alert"
    @if($dismissible) x-data="{ show: true }" x-show="show" x-transition @endif
    {{ $attributes->except(['variant', 'dismissible', 'icon', 'class'])->merge(['class' => $classes]) }}
>
    @if($resolvedIcon)
        <x-halo::icon :name="$resolvedIcon" size="sm" class="mt-0.5 shrink-0" />
    @endif

    <div class="flex-1">{{ $slot }}</div>

    @if($dismissible)
        <button
            type="button"
            @click="show = false"
            class="-m-2 shrink-0 rounded-halo p-2 text-current/60 transition-colors hover:text-current focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring"
            aria-label="Dismiss"
        >
            <x-halo::icon name="x" size="sm" />
        </button>
    @endif
</div>
