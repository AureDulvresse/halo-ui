@props([
    'text' => '',
    'position' => 'top', // 'top', 'bottom', 'left', 'right'
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
    x-data="window.HaloUI.tooltip()"
    @mouseenter="mouseEnter()"
    @mouseleave="mouseLeave()"
    class="relative inline-block"
>
    {{ $slot }}

    <div
        x-show="show"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute {{ $positionClasses }} z-50 px-3 py-1.5 text-sm text-white bg-slate-900 rounded-md shadow-lg whitespace-nowrap pointer-events-none"
        role="tooltip"
    >
        {{ $text }}
    </div>
</div>
