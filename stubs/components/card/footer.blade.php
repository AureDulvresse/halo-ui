@props([])

<div {{ $attributes->merge(['class' => 'px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-t border-gray-200']) }}>
    {{ $slot }}
</div>