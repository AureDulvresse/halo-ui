@props([
    'size' => halo_default('textarea', 'size', 'md'),
    'invalid' => false,
    'disabled' => false,
    'id' => null,
    'rows' => 3,
    'resize' => 'vertical',
    'error' => null,
])

@php
$textareaId = $id ?? $attributes->get('name') ?? uniqid('halo-textarea-');
$errorId = $textareaId.'-error';
$isInvalid = $invalid || $error;

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
    $isInvalid ? 'border-halo-danger focus-visible:ring-halo-danger' : 'border-halo-border hover:border-halo-foreground/40',
    $resizeClasses[$resize] ?? $resizeClasses['vertical'],
    $attributes->get('class'),
);
@endphp

<div>
    <textarea
        id="{{ $textareaId }}"
        rows="{{ $rows }}"
        @if($disabled) disabled @endif
        @if($isInvalid) aria-invalid="true" aria-describedby="{{ $errorId }}" @endif
        {{ $attributes->except(['size', 'invalid', 'disabled', 'id', 'rows', 'resize', 'error', 'class'])->merge(['class' => $classes]) }}
    >{{ $slot }}</textarea>

    @if($error)
        <p id="{{ $errorId }}" class="mt-1 text-xs text-halo-danger">{{ $error }}</p>
    @endif
</div>
