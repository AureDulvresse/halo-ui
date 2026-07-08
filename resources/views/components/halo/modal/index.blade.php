@props([
    'name',
    'size' => 'md',
])

@php
$sizes = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-lg',
    'lg' => 'max-w-2xl',
    'xl' => 'max-w-4xl',
];

$classes = halo_merge_classes(
    'relative w-full rounded-halo border border-halo-border bg-halo-background text-halo-foreground shadow-lg',
    $sizes[$size] ?? $sizes['md'],
    $attributes->get('class'),
);
@endphp

<div
    x-data="haloModal('{{ $name }}')"
    x-show="open"
    x-cloak
    @keydown.escape.window="close()"
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    style="display: none;"
>
    <div class="absolute inset-0 bg-halo-foreground/50" @click="close()" aria-hidden="true"></div>

    <div
        x-ref="panel"
        x-show="open"
        x-transition
        @click.outside="close()"
        @keydown.tab="trapFocus($event)"
        role="dialog"
        aria-modal="true"
        tabindex="-1"
        {{ $attributes->except(['name', 'size', 'class'])->merge(['class' => $classes]) }}
    >
        <button
            type="button"
            @click="close()"
            class="absolute right-4 top-4 text-halo-foreground/50 hover:text-halo-foreground"
            aria-label="Close"
        >
            <x-halo::icon name="x" size="sm" />
        </button>

        {{ $slot }}
    </div>
</div>
