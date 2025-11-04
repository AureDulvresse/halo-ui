@props([
    'position' => 'right',
    'size' => 'md',
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        'full' => 'max-w-full',
        default => 'max-w-md',
    };

    $positionClasses = match ($position) {
        'left' => 'left-0 inset-y-0',
        'right' => 'right-0 inset-y-0',
        'top' => 'top-0 inset-x-0',
        'bottom' => 'bottom-0 inset-x-0',
        default => 'right-0 inset-y-0',
    };
@endphp

<div x-data="window.HaloUI.drawer()" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-hidden">
    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" @click="hide()"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"></div>

    <div class="fixed {{ $positionClasses }} flex">
        <div x-show="open" x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="{{ $position === 'right' ? 'translate-x-full' : ($position === 'left' ? '-translate-x-full' : ($position === 'bottom' ? 'translate-y-full' : '-translate-y-full')) }}"
            x-transition:enter-end="translate-x-0 translate-y-0" @click.stop
            class="relative w-screen {{ $sizeClasses }} h-full bg-white dark:bg-slate-800 shadow-xl">
            {{ $slot }}
        </div>
    </div>
</div>
