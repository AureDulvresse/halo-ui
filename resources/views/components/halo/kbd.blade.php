@php
$classes = halo_merge_classes(
    'inline-flex items-center justify-center rounded border border-halo-border bg-halo-secondary px-1.5 py-0.5 text-xs font-mono font-medium text-halo-foreground shadow-sm',
    $attributes->get('class'),
);
@endphp

<kbd {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>{{ $slot }}</kbd>
