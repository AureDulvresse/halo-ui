@props([
    'name' => '',
    'size' => 'md',
    'backdrop' => true,
    'static' => false,
    'closeButton' => true,
    'title' => '',
    'description' => '',
    'glass' => false,
    'animate' => 'fade',
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        '2xl' => 'max-w-6xl',
        'full' => 'max-w-full mx-4',
        default => 'max-w-lg',
    };
@endphp

" x-data="{
    name: @json($name),
    previouslyFocused: null,
    get show() {
        return $store.haloModals ? $store.haloModals.isOpen(this.name) : false;
    },
    close() {
        if ($store.haloModals) {
            $store.haloModals.close(this.name);
            // Restore focus to the element that was focused before the modal opened
            if (this.previouslyFocused) {
                this.previouslyFocused.focus();
            }
        }
    },
    init() {
        this.$watch('show', value => {
                    if (value) {
                        // Store the currently focused element when opening
                        this.previouslyFocused = document.activeElement;
                        // Focus the first focusable element in the modal
                        this.$nextTick(() => {
                                    const focusable = this.$el.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
if (focusable) focusable.focus();
});
}
});
}
}" x-show="show"
@open-modal.window="
if ($event.detail.name === name && $store.haloModals) {
$store.haloModals.open(name);
}
"
@close-modal.window="
if ((!$event.detail.name || $event.detail.name === name) && $store.haloModals) {
$store.haloModals.close(name);
}
"
@keydown.escape.window="
if (!{{ $static ? 'true' : 'false' }} && $store.haloModals && $store.haloModals.topModal === name) {
close();
}
"
x-cloak
class="fixed inset-0 z-50 overflow-y-auto"
style="display: none;"
role="dialog"
aria-modal="true"
@if ($title)
    aria-labelledby="{{ $name }}-title"
@endif
@if ($description)
    aria-describedby="{{ $name }}-description"
@endif
{{ $attributes }}>

{{-- Backdrop --}}
@if ($backdrop)
    <div x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        @if (!$static) @click="close()" @endif
        class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>
@endif

{{-- Modal --}}
<div class="flex min-h-full items-center justify-center p-4">
    <div x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all w-full {{ $sizeClasses }}"
        @click.stop @keydown.tab.prevent="$event.shiftKey ? focusPrevious() : focusNext()"
        @keydown.shift.tab.prevent="focusPrevious()" x-trap.inert.noscroll="show">

        @if ($closeButton && !isset($header))
            <button @click="close()"
                class="absolute top-4 right-4 z-10 p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500"
                aria-label="{{ __('Fermer') }}">
                <x-halo::icon name="x" size="sm" />
            </button>
        @endif

        {{ $slot }}
    </div>
</div>
</div>
