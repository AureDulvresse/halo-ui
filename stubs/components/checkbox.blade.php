@props([
    'label' => null,
    'disabled' => false,
    'error' => false,
])

@php
    $stateClasses = $error 
        ? 'border-red-300 text-red-600 focus:ring-red-500' 
        : 'border-gray-300 text-blue-600 focus:ring-blue-500';
@endphp

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input 
            type="checkbox"
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge(['class' => "w-4 h-4 rounded transition-colors {$stateClasses} focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"]) }}
        />
    </div>
    @if($label)
        <div class="ml-3 text-sm">
            <label class="font-medium text-gray-700 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">
                {{ $label }}
            </label>
            @if($slot->isNotEmpty())
                <p class="text-gray-500">{{ $slot }}</p>
            @endif
        </div>
    @endif
</div>