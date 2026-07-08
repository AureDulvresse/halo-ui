@props([
    'default' => null,
])

<div x-data="haloTabs('{{ $default }}')" {{ $attributes }}>
    {{ $slot }}
</div>
