@props([
    'variant' => 'text',
    'lines' => 3,
    'width' => 'full',
])

@php
$baseClasses = 'animate-pulse bg-slate-200 dark:bg-slate-700';

$variantClasses = match($variant) {
    'text' => 'h-4 rounded',
    'title' => 'h-8 rounded',
    'circle' => 'rounded-full',
    'rect' => 'rounded-md',
    default => 'h-4 rounded',
};

$widthClass = match($width) {
    'full' => 'w-full',
    '3/4' => 'w-3/4',
    '1/2' => 'w-1/2',
    '1/4' => 'w-1/4',
    default => $width,
};

$classes = halo_merge_classes("{$baseClasses} {$variantClasses} {$widthClass}", $attributes->get('class'));
@endphp

@if($variant === 'text' && $lines > 1)
    <div class="space-y-3">
        @for($i = 0; $i < $lines; $i++)
            <div class="{{ $classes }}" style="width: {{ $i === $lines - 1 ? '75%' : '100%' }}"></div>
        @endfor
    </div>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}></div>
@endif
