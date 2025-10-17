@props([
    'padding' => '4px'
])

<div {{ $attributes->merge(['class' => "bg-[var(--color-background)] border rounded-lg shadow {$padding}"]) }}>
    {{ $slot }}
</div>
