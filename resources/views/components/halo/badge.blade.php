@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'dot' => false,
    'removable' => false,
])

@php
$baseClasses = 'inline-flex items-center gap-1.5 font-medium border';

$variantClasses = halo_classes('badge', $variant);

$sizeClasses = match($size) {
    'sm' => 'px-2 py-0.5 text-xs',
    'md' => 'px-2.5 py-0.5 text-sm',
    'lg' => 'px-3 py-1 text-base',
    default => 'px-2.5 py-0.5 text-sm',
};

$radiusClass = theme('radius.md', 'rounded-md');

$classes = halo_merge_classes(
    "{$baseClasses} {$variantClasses} {$sizeClasses} {$radiusClass}",
    $attributes->get('class')
);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($dot)
        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
    @endif

    @if($icon)
        <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$icon" class="w-3 h-3" />
    @endif

    {{ $slot }}

    @if($removable)
        <button
            type="button"
            {{ $attributes->only(['wire:click', '@click', 'onclick']) }}
            class="hover:bg-black/10 rounded-sm p-0.5 transition-colors"
            aria-label="Remove"
        >
            <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" name="x" class="w-3 h-3" />
        </button>
    @endif
</span>
