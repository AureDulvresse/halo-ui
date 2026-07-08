@props([
    'multiple' => false,
])

@php
$classes = halo_merge_classes('divide-y divide-halo-border border border-halo-border rounded-halo overflow-hidden', $attributes->get('class'));
@endphp

<div x-data="haloAccordion({{ $multiple ? 'true' : 'false' }})" {{ $attributes->except(['multiple', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
