@props([
    'rows' => 3,
    'error' => false,
    'disabled' => false,
    'label' => null,
    'hint' => null,
    'errorMessage' => null,
])

@php
    $stateClasses = $error 
        ? 'border-red-300 focus:border-red-500 focus:ring-red-500' 
        : 'border-gray-300 focus:border-blue-500 focus:ring-blue-500';
    
    $baseClasses = 'block w-full rounded-md shadow-sm px-4 py-2 text-base transition-colors duration-150 disabled:bg-gray-50 disabled:text-gray-500 disabled:cursor-not-allowed';
@endphp

<div class="space-y-1">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif
    
    <textarea 
        rows="{{ $rows }}"
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' => "{$baseClasses} {$stateClasses}"]) }}
    >{{ $slot }}</textarea>
    
    @if($hint && !$error)
        <p class="text-sm text-gray-500">{{ $hint }}</p>
    @endif
    
    @if($error && $errorMessage)
        <p class="text-sm text-red-600">{{ $errorMessage }}</p>
    @endif
</div>