@props([
    'position' => config('halo.toast.position', 'top-right'),
    'duration' => config('halo.toast.duration', 4000),
    'glass' => true,
    'animate' => 'slide',
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

    $classes = halo_classes('toast', null, null, $attributes->get('class') ?? "", [
        'glass' => $glass,
        'animate' => $animate,
        'dark' => $glass && isset($attributes['dark']),
    ]);
@endphp

<div x-data="{
    toasts: [],
    duration: {{ $duration }},
    add(toast) {
        const id = Date.now() + Math.random();
        this.toasts.push({
            id,
            type: toast.type || 'info',
            title: toast.title || '',
            message: toast.message || '',
            icon: toast.icon || this.getDefaultIcon(toast.type),
        });

        setTimeout(() => {
            this.remove(id);
        }, toast.duration || this.duration);
    },
    remove(id) {
        this.toasts = this.toasts.filter(t => t.id !== id);
    },
    getDefaultIcon(type) {
        const icons = {
            success: 'check-circle',
            error: 'x-circle',
            warning: 'exclamation-triangle',
            info: 'information-circle',
        };
        return icons[type] || icons.info;
    },
    getColorClasses(type) {
        const glassColors = {
            success: 'bg-emerald-500/90 backdrop-blur supports-[backdrop-filter]:bg-emerald-500/70',
            error: 'bg-red-500/90 backdrop-blur supports-[backdrop-filter]:bg-red-500/70',
            warning: 'bg-amber-500/90 backdrop-blur supports-[backdrop-filter]:bg-amber-500/70',
            info: 'bg-blue-500/90 backdrop-blur supports-[backdrop-filter]:bg-blue-500/70'
        };

        const solidColors = {
            success: 'bg-emerald-500 dark:bg-emerald-600',
            error: 'bg-red-500 dark:bg-red-600',
            warning: 'bg-amber-500 dark:bg-amber-600',
            info: 'bg-blue-500 dark:bg-blue-600'
        };
        return colors[type] || colors.info;
    }
}" @toast.window="add($event.detail)"
    class="fixed {{ $positionClasses }} z-50 space-y-3 pointer-events-none max-w-md" {{ $attributes }}>
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="true" x-transition x-transition:enter.duration.300ms x-transition:leave.duration.200ms
            class="pointer-events-auto w-full rounded-2xl shadow-lg overflow-hidden"
            :class="getColorClasses(toast.type)">
            <div class="p-4">
                <div class="flex items-start gap-3">
                    <div class="shrink-0 mt-0.5">
                        <x-halo::icon :name="toast . icon" size="lg" class="text-white" x-bind:name="toast.icon" />
                    </div>

                    <div class="flex-1 min-w-0">
                        <p x-text="toast.title" @class([
                            'text-sm font-bold',
                            'text-white' => $glass,
                            'text-gray-900 dark:text-white' => !$glass,
                        ])></p>
                        <p x-text="toast.message" x-show="toast.message" @class([
                            'mt-1 text-sm',
                            'text-white/90' => $glass,
                            'text-gray-600 dark:text-gray-300' => !$glass,
                        ])></p>
                    </div>

                    <button @click="remove(toast.id)" @class([
                        'shrink-0 ml-2 p-1 rounded-lg transition-colors focus:outline-none focus:ring-2',
                        'text-white/80 hover:text-white hover:bg-white/20 focus:ring-white/50' => $glass,
                        'text-gray-400 hover:text-gray-600 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-primary-500/50' => !$glass,
                    ])>
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Progress bar --}}
                <div class="mt-3 h-1 rounded-full overflow-hidden"
                    :class="glass ? 'bg-white/30' : 'bg-black/10 dark:bg-white/10'" x-data="{ width: 100 }"
                    x-init="let interval = setInterval(() => {
                        width = width - (100 / (duration / 100));
                        if (width <= 0) clearInterval(interval);
                    }, 100);">
                    <div class="h-full bg-white transition-all duration-100 ease-linear rounded-full"
                        :style="`width: ${width}%`"></div>
                </div>
            </div>
        </div>
    </template>
</div>

{{-- Laravel Session Flash Integration --}}
@if (session()->has('toast'))
    @php
        $toast = session('toast');
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                window.dispatchEvent(new CustomEvent('toast', {
                    detail: {
                        type: '{{ $toast['type'] ?? 'info' }}',
                        title: '{{ $toast['title'] ?? '' }}',
                        message: '{{ $toast['message'] ?? '' }}',
                        duration: {{ $toast['duration'] ?? 'null' }}
                    }
                }));
            }, 100);
        });
    </script>
@endif
