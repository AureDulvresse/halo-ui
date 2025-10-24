@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false,
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'left'
])

@php
    $disabled = $disabled || $loading;

    $variantClasses = match($variant) {
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent focus:ring-blue-500',
        'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-900 border-transparent focus:ring-gray-500',
        'success' => 'bg-green-600 hover:bg-green-700 text-white border-transparent focus:ring-green-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white border-transparent focus:ring-red-500',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white border-transparent focus:ring-yellow-500',
        'outline' => 'bg-transparent hover:bg-gray-50 text-gray-700 border-gray-300 focus:ring-blue-500',
        'ghost' => 'bg-transparent hover:bg-gray-100 text-gray-700 border-transparent focus:ring-gray-500',
        'link' => 'bg-transparent hover:underline text-blue-600 border-transparent focus:ring-blue-500 px-0',
        default => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent focus:ring-blue-500',
    };

    $sizeClasses = match($size) {
        'xs' => 'px-2.5 py-1.5 text-xs gap-1.5',
        'sm' => 'px-3 py-2 text-sm gap-2',
        'md' => 'px-4 py-2.5 text-base gap-2',
        'lg' => 'px-5 py-3 text-lg gap-2.5',
        'xl' => 'px-6 py-3.5 text-xl gap-3',
        default => 'px-4 py-2.5 text-base gap-2',
    };

    $baseClasses = 'inline-flex items-center justify-center font-medium border rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
@endphp

<button
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => "{$baseClasses} {$variantClasses} {$sizeClasses}"]) }}
>
    @if($loading)
        <svg
            class="animate-spin {{ $sizeClasses }} align-middle"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            style="color: currentColor;"
        >
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @elseif($icon && $iconPosition === 'left')
        <x-halo::icon :name="$icon" class="w-4 h-4" />
    @endif

    {{ $slot }}

    @if($icon && $iconPosition === 'right' && !$loading)
        <x-halo::icon :name="$icon" class="w-4 h-4" />
    @endif
</button>
