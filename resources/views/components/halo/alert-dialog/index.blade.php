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

{{--
    AlertDialog is a stricter variant of Modal: it never closes on a backdrop
    click or on Escape, so the user is forced to pick one of the explicit
    actions in its footer (WAI-ARIA alertdialog pattern). Accordingly, unlike
    <x-halo::modal>, there's no @keydown.escape.window on the wrapper, no
    @click="close()" on the backdrop, no @click.outside on the panel, and no
    dismiss button in the header.
--}}
<div
    x-data="haloAlertDialog('{{ $name }}')"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    style="display: none;"
>
    <div
        x-show="open"
        x-transition.opacity
        class="absolute inset-0 bg-halo-foreground/50"
        aria-hidden="true"
    ></div>

    <div
        x-ref="panel"
        x-show="open"
        x-transition
        @keydown.tab="trapFocus($event)"
        role="alertdialog"
        aria-modal="true"
        tabindex="-1"
        {{ $attributes->except(['name', 'size', 'class'])->merge(['class' => halo_merge_classes($classes, 'max-h-[calc(100vh-2rem)] overflow-y-auto')]) }}
    >
        {{ $slot }}
    </div>
</div>
