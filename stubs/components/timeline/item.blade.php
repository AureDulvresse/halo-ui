@props([
    'icon' => null,
    'time' => null,
    'variant' => 'default',
])

@php
    $variantClasses = match($variant) {
        'success' => 'bg-green-500 text-white',
        'danger' => 'bg-red-500 text-white',
        'warning' => 'bg-yellow-500 text-white',
        'info' => 'bg-blue-500 text-white',
        default => 'bg-gray-300 text-gray-600',
    };
@endphp

<div class="relative flex items-start">
    {{-- Timeline line --}}
    <div class="absolute left-4 top-8 bottom-0 w-0.5 bg-gray-300 -mb-8"></div>
    
    {{-- Icon/Dot --}}
    <div class="relative z-10 flex items-center justify-center w-8 h-8 rounded-full {{ $variantClasses }} ring-4 ring-white flex-shrink-0">
        @if($icon)
            <x-icon :name="$icon" class="w-4 h-4" />
        @else
            <div class="w-2 h-2 rounded-full bg-white"></div>
        @endif
    </div>
    
    {{-- Content --}}
    <div class="ml-4 flex-1">
        @if($time)
            <time class="text-sm text-gray-500 mb-1 block">{{ $time }}</time>
        @endif
        <div class="text-gray-900">
            {{ $slot }}
        </div>
    </div>
</div>