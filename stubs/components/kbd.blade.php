@props([
    'size' => 'md',
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'px-1.5 py-0.5 text-xs',
        'md' => 'px-2 py-1 text-sm',
        'lg' => 'px-2.5 py-1.5 text-base',
        default => 'px-2 py-1 text-sm',
    };

    $classes = halo_merge_classes(
        "inline-flex items-center justify-center font-mono font-semibold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded shadow-sm {$sizeClasses}",
        $attributes->get('class'),
    );
@endphp

<kbd {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</kbd>
