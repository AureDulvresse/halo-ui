@props([
    'title' => null,
    'description' => null,
])

@php
$classes = halo_merge_classes(
    'flex flex-col gap-4 border-b border-halo-border pb-6 sm:flex-row sm:items-center sm:justify-between',
    $attributes->get('class'),
);
@endphp

<div {{ $attributes->except(['title', 'description', 'class'])->merge(['class' => $classes]) }}>
    <div>
        @if($title)
            <h1 class="text-xl font-semibold text-halo-foreground">{{ $title }}</h1>
        @endif

        @if($description)
            <p class="mt-1 text-sm text-halo-foreground/60">{{ $description }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="flex shrink-0 items-center gap-2">
            {{ $actions }}
        </div>
    @endisset
</div>
