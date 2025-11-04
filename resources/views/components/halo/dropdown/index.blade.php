@props([
    'align' => 'left',
    'width' => '48',
])

@php
$alignmentClasses = match ($align) {
    'left' => 'origin-top-left left-0',
    'right' => 'origin-top-right right-0',
    'top' => 'origin-bottom bottom-full',
    default => 'origin-top-left left-0',
};

$widthClass = match ($width) {
    '48' => 'w-48',
    '56' => 'w-56',
    '64' => 'w-64',
    'full' => 'w-full',
    default => "w-{$width}",
};
@endphp

<div
    x-data="window.HaloUI.dropdown()"
    @click.outside="close()"
    @keydown.escape.window="close()"
    class="relative inline-block text-left"
>
    <!-- Trigger -->
    <div @click="toggle()">
        {{ $trigger ?? '' }}
    </div>

    <!-- Dropdown Menu -->
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        @keydown="handleKeydown($event)"
        x-ref="menu"
        class="absolute {{ $alignmentClasses }} {{ $widthClass }} mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
        role="menu"
        aria-orientation="vertical"
    >
        <div class="py-1">
            {{ $slot }}
        </div>
    </div>
</div>
