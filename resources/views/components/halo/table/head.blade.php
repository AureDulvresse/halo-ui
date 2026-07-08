@php
$classes = halo_merge_classes(
    'px-4 py-3 text-xs font-semibold uppercase tracking-wide text-halo-foreground/60',
    $attributes->get('class'),
);
@endphp

<th scope="col" {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</th>
