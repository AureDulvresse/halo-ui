@props([
    'value' => '',
    'selected' => false,
])

<option 
    value="{{ $value }}"
    {{ $selected ? 'selected' : '' }}
    {{ $attributes }}
>
    {{ $slot }}
</option>