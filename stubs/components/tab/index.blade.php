@props([
    'default' => null,
])

<div 
    x-data="{ activeTab: '{{ $default }}' }"
    {{ $attributes->merge(['class' => 'space-y-4']) }}
>
    {{ $slot }}
</div>