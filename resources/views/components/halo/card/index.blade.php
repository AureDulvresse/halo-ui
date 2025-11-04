@props([
    'variant' => 'default',
    'padding' => true,
])

@php
$baseClasses = 'bg-white border border-slate-200 shadow-sm';
$radiusClass = theme('radius.lg', 'rounded-lg');
$paddingClass = $padding ? '' : 'p-0';

$variantClasses = match($variant) {
    'bordered' => 'border-2',
    'elevated' => 'shadow-md',
    'flat' => 'shadow-none',
    default => '',
};

$classes = halo_merge_classes(
    "{$baseClasses} {$radiusClass} {$variantClasses} {$paddingClass}",
    $attributes->get('class')
);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
