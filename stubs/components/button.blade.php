@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $variants = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'outline' => 'bg-transparent text-gray-800 hover:bg-gray-300 border border-2'
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];
@endphp

<button
    x-data
    @click="$el.classList.toggle('scale-95'); setTimeout(() => $el.classList.remove('scale-95'), 100)"
    {{ $attributes->merge([
        'class' => "rounded-md font-medium transition transform active:scale-95 {$variants[$variant]} {$sizes[$size]}"
    ]) }}
>
    {{ $slot }}
</button>
