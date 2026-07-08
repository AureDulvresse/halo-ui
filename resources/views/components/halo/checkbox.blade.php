@props([
    'id' => null,
    'disabled' => false,
])

@php
$checkboxId = $id ?? $attributes->get('name') ?? uniqid('halo-checkbox-');

// Fixed rounded-sm rather than the theme's rounded-halo token — Aurora's
// 0.75rem radius would round a 16px box into a near-circle, which reads as
// a radio button rather than a checkbox.
$boxClasses = halo_merge_classes(
    'w-4 h-4 rounded-sm border-halo-border accent-halo-primary transition-colors hover:border-halo-foreground/40 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:opacity-50 disabled:cursor-not-allowed',
    $attributes->get('class'),
);
@endphp

<label
    for="{{ $checkboxId }}"
    class="inline-flex items-center gap-2 py-2 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"
>
    <input
        type="checkbox"
        id="{{ $checkboxId }}"
        @if($disabled) disabled @endif
        {{ $attributes->except(['id', 'disabled', 'class'])->merge(['class' => $boxClasses]) }}
    />

    @if(trim((string) $slot) !== '')
        <span class="text-sm text-halo-foreground">{{ $slot }}</span>
    @endif
</label>
