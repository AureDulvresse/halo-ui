@props([
    'required' => false,
])

@php
$classes = halo_merge_classes('text-sm font-medium text-halo-foreground', $attributes->get('class'));
@endphp

<label {{ $attributes->except(['required', 'class'])->merge(['class' => $classes]) }}>
    {{ $slot }}

    @if($required)
        <span class="text-halo-danger" aria-hidden="true">*</span>
    @endif
</label>
