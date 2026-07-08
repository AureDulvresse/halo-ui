@props([
    'href' => null,
    'current' => false,
])

<li {{ $attributes->except(['href', 'current', 'class'])->merge(['class' => halo_merge_classes('flex items-center gap-2', $attributes->get('class'))]) }}>
    @if($current)
        <span aria-current="page" class="font-medium text-halo-foreground">{{ $slot }}</span>
    @else
        <a href="{{ $href }}" class="text-halo-foreground/60 hover:text-halo-foreground">{{ $slot }}</a>
        <x-halo::icon name="chevron-right" size="xs" class="text-halo-foreground/30" />
    @endif
</li>
