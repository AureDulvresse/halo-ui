@props([
    'value' => null
])

<div @click="selected='{{ $value }}'; open=false"
    class="cursor-pointer px-4 py-2 hover:bg-[var(--color-primary)] hover:text-white">
    {{ $slot }}
</div>
