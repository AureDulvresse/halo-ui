@php
$classes = halo_merge_classes('inline-flex items-center gap-1 border-b border-halo-border', $attributes->get('class'));
@endphp

<div
    role="tablist"
    @keydown.right.prevent="focusSibling($event, 1)"
    @keydown.left.prevent="focusSibling($event, -1)"
    {{ $attributes->except(['class'])->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
