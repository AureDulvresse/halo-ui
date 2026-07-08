@php
$classes = halo_merge_classes('flex items-center gap-1', $attributes->get('class'));
@endphp

<nav {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>
    <ul class="flex items-center gap-1">
        {{ $slot }}
    </ul>
</nav>
