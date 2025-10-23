@props([
    'label' => null,
    'error' => false,
    'disabled' => false,
    'placeholder' => 'Select an option',
    'size' => 'md',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-4 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };
    
    $stateClasses = $error 
        ? 'border-red-300 focus:border-red-500 focus:ring-red-500' 
        : 'border-gray-300 focus:border-blue-500 focus:ring-blue-500';
    
    $baseClasses = 'block w-full rounded-md shadow-sm transition-colors duration-150 disabled:bg-gray-50 disabled:text-gray-500 disabled:cursor-not-allowed appearance-none bg-white';
@endphp

<div class="space-y-1">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif
    
    <div class="relative">
        <select 
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$stateClasses}"]) }}
        >
            @if($placeholder)
                <option value="" disabled selected>{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>