@props([
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => null,
    'id' => null,
    'disabled' => false,
    'showValue' => false,
])

@php
$sliderId = $id ?? $attributes->get('name') ?? uniqid('halo-slider-');
$initial = $value ?? $min;

$classes = halo_merge_classes(
    'halo-slider w-full disabled:opacity-50 disabled:cursor-not-allowed',
    $attributes->get('class'),
);
@endphp

@if($showValue)
    {{-- x-model keeps the visible label in sync with the thumb as it's dragged,
         without a page reload or server round-trip. --}}
    <div x-data="{ value: {{ (float) $initial }} }" class="flex items-center gap-3">
        <input
            type="range"
            id="{{ $sliderId }}"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            x-model.number="value"
            @if($disabled) disabled @endif
            {{ $attributes->except(['min', 'max', 'step', 'value', 'id', 'disabled', 'showValue', 'class'])->merge(['class' => $classes]) }}
        />

        <span class="w-10 shrink-0 text-right text-sm tabular-nums text-halo-foreground" x-text="value"></span>
    </div>
@else
    <input
        type="range"
        id="{{ $sliderId }}"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        @if($value !== null) value="{{ $value }}" @endif
        @if($disabled) disabled @endif
        {{ $attributes->except(['min', 'max', 'step', 'value', 'id', 'disabled', 'showValue', 'class'])->merge(['class' => $classes]) }}
    />
@endif
