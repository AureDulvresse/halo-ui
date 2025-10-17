@props([
    'label' => '',
])


<div x-data="{ open: false }" class="relative inline-block">
    <button @click="open = !open" type="button"
        class="px-4 py-2 rounded-md bg-[var(--color-primary)] text-white flex items-center gap-2">
        {{ $label }}
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-show="open" @click.away="open = false" x-transition
        class="absolute mt-1 w-56 rounded-md shadow-lg bg-[var(--color-background)] z-50">
        {{ $slot }}
    </div>
</div>
