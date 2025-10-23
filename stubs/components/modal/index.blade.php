@props([
    'name' => '',
    'size' => 'md',
    'backdrop' => true,
    'static' => false,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        '2xl' => 'max-w-6xl',
        'full' => 'max-w-full mx-4',
        default => 'max-w-lg',
    };
@endphp

<div
    x-data="{ 
        show: false,
        name: '{{ $name }}',
        init() {
            this.$watch('show', value => {
                if (value) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = null;
                }
            });
        }
    }"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="!{{ $static ? 'true' : 'false' }} && (show = false)"
    x-cloak
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;"
    {{ $attributes }}
>
    <!-- Backdrop -->
    @if($backdrop)
        <div 
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @if(!$static)
                @click="show = false"
            @endif
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        ></div>
    @endif

    <!-- Modal -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full {{ $sizeClasses }}"
            @click.stop
        >
            {{ $slot }}
        </div>
    </div>
</div>