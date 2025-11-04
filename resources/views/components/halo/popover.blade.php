@props([
    'position' => 'top',
    'trigger' => 'click',
])

@php
    $positionClasses = match($position) {
        'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
        default => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
    };
@endphp

<div
    x-data="{ open: false }"
    @click.away="open = false"
    class="relative inline-block"
    {{ $attributes }}
>
    <div
        @if($trigger === 'click')
            @click="open = !open"
        @elseif($trigger === 'hover')
            @mouseenter="open = true"
            @mouseleave="open = false"
        @endif
    >
        {{ $trigger ?? '' }}
    </div>

    <div
        x-show="open"
        x-transition
        class="absolute {{ $positionClasses }} z-50 w-64 bg-white rounded-lg shadow-lg border border-gray-200 p-4"
        style="display: none;"
    >
        {{ $slot }}
    </div>
</div>
