@props([
    'placeholder' => 'Type a command or search...',
])

<div
    x-data="{
        open: false,
        search: '',
        init() {
            window.addEventListener('keydown', (e) => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                    e.preventDefault();
                    this.open = !this.open;
                }
                if (e.key === 'Escape') {
                    this.open = false;
                }
            });
        }
    }"
    @keydown.escape.window="open = false"
    {{ $attributes }}
>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="fixed inset-0 z-50 bg-black/50"
        @click="open = false"
        style="display: none;"
    ></div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        class="fixed top-20 left-1/2 -translate-x-1/2 z-50 w-full max-w-2xl"
        style="display: none;"
        @click.stop
    >
        <div class="bg-white rounded-lg shadow-2xl border border-gray-200 overflow-hidden">
            <div class="border-b border-gray-200 p-4">
                <input
                    x-model="search"
                    type="text"
                    placeholder="{{ $placeholder }}"
                    class="w-full text-lg focus:outline-none"
                    x-ref="searchInput"
                />
            </div>

            <div class="max-h-96 overflow-y-auto p-2">
                {{ $slot }}
            </div>

            <div class="border-t border-gray-200 px-4 py-3 text-xs text-gray-500 flex items-center justify-between">
                <span>Press <kbd class="px-2 py-1 bg-gray-100 rounded">ESC</kbd> to close</span>
                <span><kbd class="px-2 py-1 bg-gray-100 rounded">⌘K</kbd> or <kbd class="px-2 py-1 bg-gray-100 rounded">Ctrl+K</kbd> to open</span>
            </div>
        </div>
    </div>
</div>
