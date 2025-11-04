@props([
    'defaultTab' => 0,
    'variant' => 'line', // 'line', 'pills', 'enclosed'
])

@php
$variantClasses = match($variant) {
    'line' => 'border-b border-slate-200',
    'pills' => 'space-x-1',
    'enclosed' => 'border border-slate-200 rounded-lg bg-slate-50 p-1',
    default => 'border-b border-slate-200',
};
@endphp

<div
    x-data="window.HaloUI.tabs({ defaultTab: {{ $defaultTab }} })"
    {{ $attributes->merge(['class' => 'w-full']) }}
>
    {{ $slot }}
</div>
