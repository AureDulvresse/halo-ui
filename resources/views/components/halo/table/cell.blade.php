@php
$classes = halo_merge_classes('px-4 py-3', $attributes->get('class'));
@endphp

<td {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</td>
