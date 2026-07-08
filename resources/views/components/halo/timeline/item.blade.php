@props([
    'title',
    'date' => null,
])

@php
$classes = halo_merge_classes('mb-6 ml-6', $attributes->get('class'));
@endphp

<li {{ $attributes->except(['title', 'date', 'class'])->merge(['class' => $classes]) }}>
    <span class="absolute -left-[7px] w-3 h-3 rounded-full bg-halo-primary border-2 border-halo-background"></span>

    <h3 class="text-sm font-semibold text-halo-foreground">{{ $title }}</h3>

    @if($date)
        <time class="mb-1 block text-xs font-normal text-halo-foreground/60">{{ $date }}</time>
    @endif

    <div class="text-sm text-halo-foreground/80">
        {{ $slot }}
    </div>
</li>
