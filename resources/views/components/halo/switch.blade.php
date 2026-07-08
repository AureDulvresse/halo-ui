@props([
    'id' => null,
    'disabled' => false,
])

@php
$switchId = $id ?? $attributes->get('name') ?? uniqid('halo-switch-');

$inputClasses = halo_merge_classes('peer sr-only', $attributes->get('class'));
@endphp

<label
    for="{{ $switchId }}"
    class="inline-flex items-center gap-2 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"
>
    <input
        type="checkbox"
        role="switch"
        id="{{ $switchId }}"
        @if($disabled) disabled @endif
        {{ $attributes->except(['id', 'disabled', 'class'])->merge(['class' => $inputClasses]) }}
    />

    <span
        class="relative inline-block h-5 w-9 shrink-0 rounded-full bg-halo-secondary transition-colors
            peer-checked:bg-halo-primary
            peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-halo-ring peer-focus-visible:ring-offset-2
            after:absolute after:left-0.5 after:top-0.5 after:h-4 after:w-4 after:rounded-full after:bg-white after:shadow after:transition-transform after:content-['']
            peer-checked:after:translate-x-4"
    ></span>

    @if(trim((string) $slot) !== '')
        <span class="text-sm text-halo-foreground">{{ $slot }}</span>
    @endif
</label>
