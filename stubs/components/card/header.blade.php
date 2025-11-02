@props([])

<div {{ $attributes->merge(['class' => 'px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white']) }}>
    {{ $slot }}
</div>