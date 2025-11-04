@props([
    'href' => null,
    'icon' => null,
    'destructive' => false,
])

@php
$baseClasses = 'flex items-center gap-2 w-full px-4 py-2 text-sm transition-colors focus:outline-none focus:bg-slate-100';
$colorClasses = $destructive
    ? 'text-red-700 hover:bg-red-50 focus:bg-red-50'
    : 'text-slate-700 hover:bg-slate-100';

$classes = halo_merge_classes("{$baseClasses} {$colorClasses}", $attributes->get('class'));
@endphp

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
        role="menuitem"
        tabindex="-1"
    >
        @if($icon)
            <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$icon" class="w-4 h-4" />
        @endif
        {{ $slot }}
    </a>
@else
    <button
        type="button"
        {{ $attributes->merge(['class' => $classes]) }}
        role="menuitem"
        tabindex="-1"
    >
        @if($icon)
            <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$icon" class="w-4 h-4" />
        @endif
        {{ $slot }}
    </button>
@endif
