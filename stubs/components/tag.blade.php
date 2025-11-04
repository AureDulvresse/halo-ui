@props([
    'variant' => 'primary',
    'removable' => false,
    'icon' => null,
])

@php
    $baseClasses = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 text-sm font-medium border';
    $variantClasses = halo_classes('badge', $variant);
    $radiusClass = theme('radius.md', 'rounded-md');
    $classes = halo_merge_classes("{$baseClasses} {$variantClasses} {$radiusClass}", $attributes->get('class'));
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if ($icon)
        <x-halo::icon :name="$icon" class="w-3 h-3" />
    @endif

    {{ $slot }}

    @if ($removable)
        <button type="button" class="hover:bg-black/10 dark:hover:bg-white/10 rounded-sm p-0.5 transition-colors"
            aria-label="Remove">
            <x-halo::icon name="x" class="w-3 h-3" />
        </button>
    @endif
</span>
