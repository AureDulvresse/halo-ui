@props([
    'value' => 0,
    'max' => 100,
    'size' => 'md',
    'variant' => 'primary',
    'label' => null,
    'showValue' => false,
])

@php
$percentage = min(100, max(0, ($value / $max) * 100));

$heightClass = match($size) {
    'xs' => 'h-1',
    'sm' => 'h-2',
    'md' => 'h-3',
    'lg' => 'h-4',
    default => 'h-3',
};

$colorClass = match($variant) {
    'primary' => 'bg-blue-600',
    'success' => 'bg-green-600',
    'warning' => 'bg-amber-600',
    'danger' => 'bg-red-600',
    default => 'bg-blue-600',
};

$radiusClass = theme('radius.full', 'rounded-full');
@endphp

<div class="w-full">
    @if($label || $showValue)
        <div class="flex justify-between items-center mb-2">
            @if($label)
                <span class="text-sm font-medium text-slate-700">{{ $label }}</span>
            @endif

            @if($showValue)
                <span class="text-sm text-slate-600">{{ round($percentage) }}%</span>
            @endif
        </div>
    @endif

    <div class="w-full bg-slate-200 {{ $radiusClass }} {{ $heightClass }} overflow-hidden">
        <div
            class="{{ $colorClass }} {{ $heightClass }} {{ $radiusClass }} transition-all duration-300 ease-out"
            style="width: {{ $percentage }}%"
            role="progressbar"
            aria-valuenow="{{ $value }}"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}"
        ></div>
    </div>
</div>
