@props([
    'src' => null,
    'alt' => '',
    'initials' => null,
    'size' => 'md',
    'status' => null,
])

@php
$sizes = [
    'xs' => 'w-6 h-6 text-xs',
    'sm' => 'w-8 h-8 text-sm',
    'md' => 'w-10 h-10 text-base',
    'lg' => 'w-12 h-12 text-lg',
    'xl' => 'w-16 h-16 text-xl',
];

$statusColors = [
    'online' => 'bg-halo-success',
    'offline' => 'bg-halo-secondary',
    'busy' => 'bg-halo-danger',
    'away' => 'bg-halo-warning',
];

$classes = halo_merge_classes(
    'inline-flex items-center justify-center rounded-full bg-halo-secondary text-halo-secondary-foreground font-medium overflow-hidden',
    $sizes[$size] ?? $sizes['md'],
    $attributes->get('class'),
);
@endphp

<span class="relative inline-flex">
    <span {{ $attributes->except(['src', 'alt', 'initials', 'size', 'status', 'class'])->merge(['class' => $classes]) }}>
        @if($src)
            <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover" />
        @elseif($initials)
            {{ $initials }}
        @else
            <x-halo::icon name="user" size="sm" />
        @endif
    </span>

    @if($status)
        <span
            class="absolute bottom-0 right-0 block w-2.5 h-2.5 rounded-full border-2 border-halo-background {{ $statusColors[$status] ?? $statusColors['offline'] }}"
            aria-hidden="true"
        ></span>
    @endif
</span>
