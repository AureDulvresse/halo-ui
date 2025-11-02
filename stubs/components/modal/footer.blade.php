@props([])

<div {{ $attributes->merge(['class' => 'px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end gap-3']) }}>
    {{ $slot }}
</div>