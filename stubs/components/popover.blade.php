@props([
    'position' => 'bottom',
])

@php
$positionClasses = match($position) {
    'top' => 'bottom-full mb-2',
    'bottom' => 'top-full mt-2',
    'left' => 'right-full mr-2',
    'right' => 'left-full ml-2',
    default => 'top-full mt-2',
};
@endphp

<div
    x-data="window.HaloUI.popover()"
    @click.outside="close()"
    class="relative inline-block"
>
    <div @click="toggle()">
        {{ $trigger ?? '' }}
    </div>

    <div
        x-show="open"
        x-cloak
        x-transition
        class="absolute {{ $positionClasses }} z-50 w-64 p-4 bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700"
    >
        {{ $slot }}
    </div>
</div>
