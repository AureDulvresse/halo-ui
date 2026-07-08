@props([
    'size' => halo_default('select', 'size', 'md'),
    'options' => null,
    'invalid' => false,
    'disabled' => false,
    'id' => null,
    'error' => null,
])

@php
$selectId = $id ?? $attributes->get('name') ?? uniqid('halo-select-');
$errorId = $selectId.'-error';
$isInvalid = $invalid || $error;

$classes = halo_variants([
    'base' => 'block w-full appearance-none rounded-halo border bg-halo-background text-halo-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:opacity-50 disabled:cursor-not-allowed pr-10',
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
    $isInvalid ? 'border-halo-danger focus-visible:ring-halo-danger' : 'border-halo-border hover:border-halo-foreground/40',
    $attributes->get('class'),
);
@endphp

<div>
    <div class="relative">
        <select
            id="{{ $selectId }}"
            @if($disabled) disabled @endif
            @if($isInvalid) aria-invalid="true" aria-describedby="{{ $errorId }}" @endif
            {{ $attributes->except(['size', 'options', 'invalid', 'disabled', 'id', 'error', 'class'])->merge(['class' => $classes]) }}
        >
            @if($options)
                @foreach($options as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            @else
                {{ $slot }}
            @endif
        </select>

        <x-halo::icon
            name="chevron-down"
            size="sm"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-halo-foreground/50 pointer-events-none"
        />
    </div>

    @if($error)
        <p id="{{ $errorId }}" class="mt-1 text-xs text-halo-danger">{{ $error }}</p>
    @endif
</div>
