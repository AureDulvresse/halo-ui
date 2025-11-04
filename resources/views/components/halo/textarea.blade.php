@props([
    'label' => null,
    'error' => null,
    'hint' => null,
    'rows' => 4,
    'disabled' => false,
    'resize' => 'vertical', // 'none', 'vertical', 'horizontal', 'both'
])

@php
$baseClasses = 'block w-full border transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:opacity-50 disabled:cursor-not-allowed';

$sizeClasses = 'px-4 py-2 text-base';
$errorClasses = $error ? 'border-red-300 text-red-900 focus:ring-red-500' : 'border-slate-300 text-slate-900';
$radiusClass = theme('radius.md', 'rounded-md');

$resizeClass = match($resize) {
    'none' => 'resize-none',
    'vertical' => 'resize-y',
    'horizontal' => 'resize-x',
    'both' => 'resize',
    default => 'resize-y',
};

$classes = halo_merge_classes(
    "{$baseClasses} {$sizeClasses} {$errorClasses} {$radiusClass} {$resizeClass}",
    $attributes->get('class')
);
@endphp

<div class="w-full">
    @if($label)
        <label class="block text-sm font-medium text-slate-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <textarea
        rows="{{ $rows }}"
        {{ $attributes->merge(['class' => $classes]) }}
        @if($disabled) disabled @endif
    >{{ $slot }}</textarea>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @elseif($hint)
        <p class="mt-1 text-sm text-slate-500">{{ $hint }}</p>
    @endif
</div>
