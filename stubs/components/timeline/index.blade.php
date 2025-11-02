@props([
    'position' => 'left',
])

<div {{ $attributes->merge(['class' => 'space-y-8']) }}>
    {{ $slot }}
</div>
