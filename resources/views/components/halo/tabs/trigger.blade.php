@props([
    'tab',
])

@php
$classes = halo_merge_classes(
    'px-4 py-2 text-sm font-medium border-b-2 -mb-px transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring focus-visible:ring-inset',
    $attributes->get('class'),
);
@endphp

<button
    type="button"
    role="tab"
    :aria-selected="isActive('{{ $tab }}') ? 'true' : 'false'"
    :tabindex="isActive('{{ $tab }}') ? 0 : -1"
    :class="isActive('{{ $tab }}') ? 'border-halo-primary text-halo-primary' : 'border-transparent text-halo-foreground/60 hover:text-halo-foreground'"
    @click="select('{{ $tab }}')"
    {{ $attributes->except(['tab', 'class'])->merge(['class' => $classes]) }}
>
    {{ $slot }}
</button>
