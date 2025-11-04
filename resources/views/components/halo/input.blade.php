@props([
    'type' => 'text',
    'size' => halo_default('input', 'size', 'md'),
    'error' => null,
    'label' => null,
    'hint' => null,
    'icon' => null,
    'iconPosition' => 'left',
    'disabled' => false,
])

@php
$baseClasses = 'block w-full border transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:opacity-50 disabled:cursor-not-allowed';

$sizeClasses = halo_classes('input', null, $size);

$errorClasses = $error ? 'border-red-300 text-red-900 focus:ring-red-500' : 'border-slate-300 text-slate-900';

$iconPadding = $icon ? ($iconPosition === 'left' ? 'pl-10' : 'pr-10') : '';

$radiusClass = theme('radius.md', 'rounded-md');

$classes = halo_merge_classes(
    "{$baseClasses} {$sizeClasses} {$errorClasses} {$iconPadding} {$radiusClass}",
    $attributes->get('class')
);
@endphp

<div class="w-full">
    @if($label)
        <label class="block text-sm font-medium text-slate-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        @if($icon && $iconPosition === 'left')
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$icon" class="w-5 h-5 text-slate-400" />
            </div>
        @endif

        <input
            type="{{ $type }}"
            {{ $attributes->merge(['class' => $classes]) }}
            @if($disabled) disabled @endif
        />

        @if($icon && $iconPosition === 'right')
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$icon" class="w-5 h-5 text-slate-400" />
            </div>
        @endif
    </div>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @elseif($hint)
        <p class="mt-1 text-sm text-slate-500">{{ $hint }}</p>
    @endif
</div>
