@props([])

<div {{ $attributes->merge(['class' => 'px-6 py-4 border-b border-gray-200']) }}>
    {{ $slot }}
</div>