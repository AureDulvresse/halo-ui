@props([
    'href' => null,
    'current' => false,
])

<li {{ $attributes->except(['href', 'current', 'class'])->merge(['class' => halo_merge_classes('flex items-center gap-2', $attributes->get('class'))]) }}>
    @if($current)
        <span aria-current="page" class="font-medium text-halo-foreground">{{ $slot }}</span>
    @else
        <a href="{{ $href }}" class="rounded-halo text-halo-foreground/60 transition-colors hover:text-halo-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring">{{ $slot }}</a>
        <x-halo::icon name="chevron-right" size="xs" class="text-halo-foreground/30" />
    @endif
</li>
