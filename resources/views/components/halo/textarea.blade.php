@props([
    'size' => halo_default('textarea', 'size', 'md'),
    'invalid' => false,
    'disabled' => false,
    'id' => null,
    'rows' => 3,
    'resize' => 'vertical',
])

@php
$textareaId = $id ?? $attributes->get('name') ?? uniqid('halo-textarea-');

$resizeClasses = [
    'none' => 'resize-none',
    'vertical' => 'resize-y',
    'horizontal' => 'resize-x',
    'both' => 'resize',
];

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
    $resizeClasses[$resize] ?? $resizeClasses['vertical'],
    $attributes->get('class'),
);
@endphp

<textarea
    id="{{ $textareaId }}"
    rows="{{ $rows }}"
    @if($disabled) disabled @endif
    @if($invalid) aria-invalid="true" @endif
    {{ $attributes->except(['size', 'invalid', 'disabled', 'id', 'rows', 'resize', 'class'])->merge(['class' => $classes]) }}
>{{ $slot }}</textarea>
