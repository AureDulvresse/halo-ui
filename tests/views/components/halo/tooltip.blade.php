@props([
    'trigger' => null
])

<div x-data="{ show: false }" class="relative inline-block">
    <div @mouseenter="show = true" @mouseleave="show = false">
        {{ $trigger ?? 'Tooltip target' }}
    </div>
    <div x-show="show" x-transition class="absolute bg-gray-800 text-white text-sm rounded px-2 py-1 mt-1">
        {{ $slot }}
    </div>
</div>
