@props([
    'maxWidth' => 'max-w-sm',
])

@php
$classes = halo_merge_classes(
    'flex min-h-screen flex-col items-center justify-center gap-6 bg-halo-background px-4 py-12',
    $attributes->get('class'),
);
@endphp

<div {{ $attributes->except(['maxWidth', 'class'])->merge(['class' => $classes]) }}>
    @isset($logo)
        <div>{{ $logo }}</div>
    @endisset

    <div class="w-full {{ $maxWidth }}">
        {{ $slot }}
    </div>
</div>
