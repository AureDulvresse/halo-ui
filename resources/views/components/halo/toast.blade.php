@props([
    'position' => 'bottom-right',
])

@php
$positions = [
    'bottom-right' => 'bottom-4 right-4',
    'bottom-left' => 'bottom-4 left-4',
    'top-right' => 'top-4 right-4',
    'top-left' => 'top-4 left-4',
];

$classes = halo_merge_classes(
    'fixed z-50 flex flex-col gap-2 w-80',
    $positions[$position] ?? $positions['bottom-right'],
    $attributes->get('class'),
);
@endphp

<div x-data {{ $attributes->except(['position', 'class'])->merge(['class' => $classes]) }} aria-live="polite" aria-atomic="true">
    <template x-for="toast in $store.haloToast.items" :key="toast.id">
        <div
            x-show="true"
            x-transition
            role="status"
            class="rounded-halo border px-4 py-3 shadow-lg text-sm flex items-start gap-3"
            :class="{
                'bg-halo-background border-halo-border text-halo-foreground': toast.variant === 'info' || !toast.variant,
                'bg-halo-success/10 border-halo-success/20 text-halo-success': toast.variant === 'success',
                'bg-halo-danger/10 border-halo-danger/20 text-halo-danger': toast.variant === 'danger',
                'bg-halo-warning/10 border-halo-warning/20 text-halo-warning': toast.variant === 'warning',
            }"
        >
            <div class="flex-1" x-text="toast.message"></div>

            <button
                type="button"
                @click="$store.haloToast.remove(toast.id)"
                aria-label="Dismiss"
                class="shrink-0 text-current/60 hover:text-current"
            >
                <x-halo::icon name="x" size="xs" />
            </button>
        </div>
    </template>
</div>
