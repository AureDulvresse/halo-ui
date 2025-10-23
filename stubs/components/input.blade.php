@props([
    'type' => 'text',
    'size' => 'md',
    'error' => false,
    'disabled' => false,
    'label' => null,
    'hint' => null,
    'errorMessage' => null,
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
    
    $baseClasses = 'block w-full rounded-md shadow-sm transition-colors duration-150 disabled:bg-gray-50 disabled:text-gray-500 disabled:cursor-not-allowed';
@endphp

<div class="space-y-1">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif
    
    <input 
        type="{{ $type }}"
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$stateClasses}"]) }}
    />
    
    @if($hint && !$error)
        <p class="text-sm text-gray-500">{{ $hint }}</p>
    @endif
    
    @if($error && $errorMessage)
        <p class="text-sm text-red-600">{{ $errorMessage }}</p>
    @endif
</div>