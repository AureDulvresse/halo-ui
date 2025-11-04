@props([
    'position' => 'top-right',
])

@php
    $positionClasses = match ($position) {
        'top-right' => 'top-4 right-4',
        'top-left' => 'top-4 left-4',
        'bottom-right' => 'bottom-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        'top-center' => 'top-4 left-1/2 -translate-x-1/2',
        'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2',
        default => 'top-4 right-4',
    };
@endphp

<div x-data="window.HaloUI.toast()" class="fixed {{ $positionClasses }} z-50 space-y-2 max-w-sm">
    <template x-for="notification in notifications" :key="notification.id">
        <div x-show="true" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="flex items-center gap-3 p-4 rounded-lg shadow-lg border bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700">
            <div x-show="notification.icon" class="flex-shrink-0">
                <svg class="w-5 h-5"
                    :class="{
                        'text-blue-500': notification.variant === 'info',
                        'text-green-500': notification.variant === 'success',
                        'text-amber-500': notification.variant === 'warning',
                        'text-red-500': notification.variant === 'danger'
                    }"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex-1">
                <p x-show="notification.title" x-text="notification.title"
                    class="text-sm font-medium text-slate-900 dark:text-slate-100"></p>
                <p x-text="notification.text" class="text-sm text-slate-700 dark:text-slate-300"></p>
            </div>

            <button @click="remove(notification.id)"
                class="flex-shrink-0 text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </template>
</div>
