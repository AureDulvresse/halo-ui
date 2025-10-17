@props([
    'placeholder' => "Select..."
])

<div x-data="{ open: false, selected: null }" class="relative inline-block w-full">
    <button @click="open = !open" type="button"
        class="w-full px-4 py-2 rounded-md border bg-[var(--color-background)] text-[var(--color-text)] flex justify-between items-center">
        <span x-text="selected ?? '{{ $placeholder }}'"></span>
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="open" @click.outside="open = false" class="absolute mt-1 w-full rounded-md shadow-lg bg-[var(--color-background)] z-50">
        {{ $slot }}
    </div>
</div>
