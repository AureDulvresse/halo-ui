@props([
    'label' => null,
    'value' => '#000000',
])

<div
    x-data="{
        color: '{{ $value }}',
        showPicker: false
    }"
    class="space-y-2"
>
    @if($label)
        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <div class="flex items-center gap-3">
        <button
            type="button"
            @click="showPicker = !showPicker"
            class="w-10 h-10 rounded-lg border-2 border-gray-300 shadow-sm hover:border-gray-400 transition-colors"
            :style="`background-color: ${color}`"
        ></button>

        <input
            type="text"
            x-model="color"
            {{ $attributes->merge(['class' => 'flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500']) }}
        />

        <input
            type="color"
            x-model="color"
            x-show="showPicker"
            class="w-0 h-0 opacity-0"
        />
    </div>
</div>
