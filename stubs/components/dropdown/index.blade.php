@props([
    'align' => 'left',
    'width' => 'w-48',
])

@php
    $alignClasses = match($align) {
        'left' => 'left-0',
        'right' => 'right-0',
        default => 'left-0',
    };
@endphp

<div 
    x-data="{ open: false }"
    @click.away="open = false"
    @keydown.escape.window="open = false"
    class="relative inline-block text-left"
    {{ $attributes }}
>
    <!-- Trigger -->
    <div @click="open = !open">
        {{ $trigger ?? '' }}
    </div>

    <!-- Dropdown Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute {{ $alignClasses }} {{ $width }} mt-2 origin-top rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
        style="display: none;"
        @click="open = false"
    >
        <div class="py-1">
            {{ $slot }}
        </div>
    </div>
</div>