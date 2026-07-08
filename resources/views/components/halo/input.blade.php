@props([
    'size' => halo_default('input', 'size', 'md'),
    'icon' => null,
    'iconPosition' => 'left',
    'invalid' => false,
    'disabled' => false,
    'id' => null,
])

@php
$inputId = $id ?? $attributes->get('name') ?? uniqid('halo-input-');

$classes = halo_variants([
    'base' => 'block w-full rounded-halo border bg-halo-background text-halo-foreground placeholder:text-halo-foreground/50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:opacity-50 disabled:cursor-not-allowed',
    'variants' => [
        'size' => [
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-3 text-lg',
        ],
    ],
    'defaults' => ['size' => 'md'],
], compact('size'));

$classes = halo_merge_classes(
    $classes,
    $invalid ? 'border-halo-danger focus-visible:ring-halo-danger' : 'border-halo-border',
    $icon ? ($iconPosition === 'left' ? 'pl-10' : 'pr-10') : null,
    $attributes->get('class'),
);
@endphp

<div class="relative">
    @if($icon && $iconPosition === 'left')
        <x-halo::icon :name="$icon" size="sm" class="absolute left-3 top-1/2 -translate-y-1/2 text-halo-foreground/50" />
    @endif

    <input
        id="{{ $inputId }}"
        @if($disabled) disabled @endif
        @if($invalid) aria-invalid="true" @endif
        {{ $attributes->except(['size', 'icon', 'iconPosition', 'invalid', 'disabled', 'id', 'class'])->merge(['class' => $classes]) }}
    />

    @if($icon && $iconPosition === 'right')
        <x-halo::icon :name="$icon" size="sm" class="absolute right-3 top-1/2 -translate-y-1/2 text-halo-foreground/50" />
    @endif
</div>
