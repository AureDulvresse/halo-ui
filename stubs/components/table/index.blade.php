@props([
    'variant' => 'default',
    'striped' => false,
    'hoverable' => true,
])

@php
$baseClasses = 'min-w-full divide-y divide-slate-200 dark:divide-slate-700';
$variantClasses = match($variant) {
    'bordered' => 'border border-slate-200 dark:border-slate-700',
    'borderless' => '',
    default => '',
};

$classes = halo_merge_classes("{$baseClasses} {$variantClasses}", $attributes->get('class'));
@endphp

<div class="overflow-x-auto rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
    <table {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </table>
</div>
