@php
$classes = halo_merge_classes('flex items-center gap-2 text-sm overflow-x-auto', $attributes->get('class'));
@endphp

<nav aria-label="Breadcrumb" {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>
    <ol class="flex items-center gap-2 whitespace-nowrap">
        {{ $slot }}
    </ol>
</nav>
