@props([
    'icon' => null,
    'title',
    'description' => null,
])

@php
$classes = halo_merge_classes('flex flex-col items-center justify-center text-center gap-2 py-12 px-4', $attributes->get('class'));
@endphp

<div {{ $attributes->except(['icon', 'title', 'description', 'actions', 'class'])->merge(['class' => $classes]) }}>
    @if($icon)
        <x-halo::icon :name="$icon" size="lg" class="text-halo-foreground/30 mb-2" />
    @endif

    <x-halo::heading level="3">{{ $title }}</x-halo::heading>

    @if($description)
        <x-halo::text muted>{{ $description }}</x-halo::text>
    @endif

    @isset($actions)
        <div class="mt-4">
            {{ $actions }}
        </div>
    @endisset
</div>
