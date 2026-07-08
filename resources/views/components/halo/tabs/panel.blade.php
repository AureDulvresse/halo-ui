@props([
    'tab',
])

@php
$classes = halo_merge_classes('py-4', $attributes->get('class'));
@endphp

<div role="tabpanel" x-show="isActive('{{ $tab }}')" x-transition {{ $attributes->except(['tab', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
