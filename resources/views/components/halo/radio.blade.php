@props([
    'id' => null,
    'disabled' => false,
])

@php
$radioId = $id ?? uniqid('halo-radio-');

$dotClasses = halo_merge_classes(
    'w-4 h-4 rounded-full border-halo-border accent-halo-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:opacity-50 disabled:cursor-not-allowed',
    $attributes->get('class'),
);
@endphp

<label
    for="{{ $radioId }}"
    class="inline-flex items-center gap-2 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"
>
    <input
        type="radio"
        id="{{ $radioId }}"
        @if($disabled) disabled @endif
        {{ $attributes->except(['id', 'disabled', 'class'])->merge(['class' => $dotClasses]) }}
    />

    @if(trim((string) $slot) !== '')
        <span class="text-sm text-halo-foreground">{{ $slot }}</span>
    @endif
</label>
