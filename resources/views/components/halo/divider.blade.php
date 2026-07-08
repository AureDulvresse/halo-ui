@props([
    'orientation' => 'horizontal',
    'label' => null,
])

@php
$classes = $orientation === 'vertical'
    ? halo_merge_classes('inline-block w-px self-stretch bg-halo-border', $attributes->get('class'))
    : halo_merge_classes('w-full border-t border-halo-border', $attributes->get('class'));
@endphp

@if($orientation === 'vertical')
    <span role="separator" aria-orientation="vertical" {{ $attributes->except(['orientation', 'label', 'class'])->merge(['class' => $classes]) }}></span>
@elseif($label)
    <div role="separator" class="flex items-center gap-3 text-xs text-halo-foreground/50">
        <span class="flex-1 border-t border-halo-border"></span>
        {{ $label }}
        <span class="flex-1 border-t border-halo-border"></span>
    </div>
@else
    <hr role="separator" {{ $attributes->except(['orientation', 'label', 'class'])->merge(['class' => $classes]) }} />
@endif
