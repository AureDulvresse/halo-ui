@props([
    'padding' => 'p-4',
])

<div {{ $attributes->merge(['class' => "bg-[var(--color-background)] border rounded-lg shadow {$padding}"]) }}>
    {{ $slot }}
</div>
