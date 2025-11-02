@props([
    'columns' => [],
])

<div class="flex gap-4 overflow-x-auto pb-4" {{ $attributes }}>
    {{ $slot }}
</div>
