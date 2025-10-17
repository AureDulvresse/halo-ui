@props([
    'trigger' => null
])

<div x-data="{ open: false }" class="relative inline-block">
    <button @click="open = !open" class="px-4 py-2 bg-gray-200 rounded">{{ $trigger ?? 'Popover' }}</button>
    <div x-show="open" @click.away="open = false" x-transition
        class="absolute mt-2 w-56 bg-white border shadow-lg rounded-md p-2">
        {{ $slot }}
    </div>
</div>
