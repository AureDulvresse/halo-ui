@php
$classes = halo_merge_classes('relative border-l border-halo-border ml-3', $attributes->get('class'));
@endphp

<ol {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</ol>
