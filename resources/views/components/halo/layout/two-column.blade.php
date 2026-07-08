@props([
    'sidebarPosition' => 'left',
    'sidebarWidth' => 'lg:w-64',
])

@php
$classes = halo_merge_classes(
    'flex flex-col gap-6 lg:flex-row lg:items-start',
    $sidebarPosition === 'right' ? 'lg:flex-row-reverse' : null,
    $attributes->get('class'),
);
@endphp

<div {{ $attributes->except(['sidebarPosition', 'sidebarWidth', 'class'])->merge(['class' => $classes]) }}>
    <aside class="{{ $sidebarWidth }} shrink-0">
        {{ $sidebar ?? '' }}
    </aside>

    <div class="min-w-0 flex-1">
        {{ $slot }}
    </div>
</div>
