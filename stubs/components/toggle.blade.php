@props([
    'size' => 'md',
    'disabled' => false,
    'label' => null,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'h-5 w-9',
        'md' => 'h-6 w-11',
        'lg' => 'h-7 w-14',
        default => 'h-6 w-11',
    };
    
    $toggleSizeClasses = match($size) {
        'sm' => 'h-4 w-4',
        'md' => 'h-5 w-5',
        'lg' => 'h-6 w-6',
        default => 'h-5 w-5',
    };
@endphp

<div class="flex items-center gap-3">
    <button
        type="button"
        role="switch"
        {{ $disabled ? 'disabled' : '' }}
        x-data="{ enabled: {{ $attributes->get('checked', 'false') }} }"
        @click="enabled = !enabled"
        :aria-checked="enabled.toString()"
        {{ $attributes->merge(['class' => "relative inline-flex flex-shrink-0 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed {$sizeClasses}"]) }}
        :class="enabled ? 'bg-blue-600' : 'bg-gray-200'"
    >
        <span class="sr-only">Toggle</span>
        <span
            :class="enabled ? 'translate-x-5' : 'translate-x-0'"
            class="pointer-events-none inline-block {{ $toggleSizeClasses }} rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
        ></span>
    </button>
    
    @if($label)
        <label class="text-sm font-medium text-gray-700 {{ $disabled ? 'opacity-50' : 'cursor-pointer' }}">
            {{ $label }}
        </label>
    @endif
</div>