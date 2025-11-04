@props([
    'size' => halo_default('modal', 'size', 'md'),
    'backdrop' => halo_default('modal', 'backdrop', 'blur'),
    'closeable' => true,
    'open' => false,
])

@php
$sizeClass = config("halo.sizes.modal.{$size}", 'max-w-lg');
$backdropClass = $backdrop === 'blur' ? 'backdrop-blur-sm' : '';
@endphp

<div
    x-data="window.HaloUI.modal({ open: {{ $open ? 'true' : 'false' }} })"
    x-show="open"
    x-cloak
    @keydown.escape.window="handleEscape($event)"
    class="fixed inset-0 z-50 overflow-y-auto"
    role="dialog"
    aria-modal="true"
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="@if($closeable) hide() @endif"
        class="fixed inset-0 bg-slate-900/50 {{ $backdropClass }}"
    ></div>

    <!-- Modal Content -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            x-ref="modal"
            tabindex="-1"
            class="relative w-full {{ $sizeClass }} bg-white rounded-lg shadow-xl"
            @click.stop
        >
            {{ $slot }}
        </div>
    </div>
</div>
