@props([
    'label',
    'value',
    'icon' => null,
    'trend' => null,
])

@php
$trendClasses = match (true) {
    $trend === null => null,
    str_starts_with($trend, '+') => 'text-halo-success',
    str_starts_with($trend, '-') => 'text-halo-danger',
    default => 'text-halo-foreground/60',
};

$classes = halo_merge_classes($attributes->get('class'));
@endphp

<x-halo::card {{ $attributes->except(['label', 'value', 'icon', 'trend', 'class'])->merge(['class' => $classes]) }}>
    <x-halo::card.body>
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-halo-foreground/60">{{ $label }}</p>
                <p class="mt-1 text-2xl font-bold text-halo-foreground">{{ $value }}</p>

                @if($trend)
                    <p class="mt-1 text-xs font-medium {{ $trendClasses }}">{{ $trend }}</p>
                @endif
            </div>

            @if($icon)
                <x-halo::icon :name="$icon" size="lg" class="shrink-0 text-halo-foreground/40" />
            @endif
        </div>
    </x-halo::card.body>
</x-halo::card>
