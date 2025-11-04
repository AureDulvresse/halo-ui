@props([
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => 50,
    'label' => null,
    'showValue' => true,
])

<div
    x-data="{ value: {{ $value }} }"
    class="space-y-2"
>
    @if($label)
        <div class="flex items-center justify-between">
            <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
            @if($showValue)
                <span class="text-sm font-medium text-gray-900" x-text="value"></span>
            @endif
        </div>
    @endif

    <input
        type="range"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        x-model="value"
        {{ $attributes->merge(['class' => 'w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider-thumb']) }}
    />
</div>

<style>
    .slider-thumb::-webkit-slider-thumb {
        appearance: none;
        width: 20px;
        height: 20px;
        background: #3b82f6;
        cursor: pointer;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .slider-thumb::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #3b82f6;
        cursor: pointer;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
</style>
