@props([
    'placeholder' => 'Type a command or search...',
])

<div
    x-data="window.HaloUI.command()"
    @keydown.window.cmd.k.prevent="show()"
    @keydown.window.ctrl.k.prevent="show()"
>
    <div
        x-show="open"
        x-cloak
        @keydown.escape="hide()"
        class="fixed inset-0 z-50 overflow-y-auto"
    >
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            @click="hide()"
            class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
        ></div>

        <div class="flex min-h-full items-start justify-center p-4 pt-[10vh]">
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                @click.stop
                class="relative w-full max-w-2xl bg-white dark:bg-slate-800 rounded-lg shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden"
            >
                <div class="flex items-center gap-3 px-4 py-3 border-b border-slate-200 dark:border-slate-700">
                    <svg class="w-5 h-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>

                    <input
                        x-ref="input"
                        x-model="query"
                        @keydown="handleKeydown($event)"
                        type="text"
                        placeholder="{{ $placeholder }}"
                        class="flex-1 bg-transparent border-none focus:outline-none text-slate-900 dark:text-slate-100 placeholder:text-slate-400 dark:placeholder:text-slate-500"
                    />

                    <kbd class="px-2 py-1 text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded">ESC</kbd>
                </div>

                <div class="max-h-96 overflow-y-auto p-2">
                    {{ $slot }}
                </div>

                <div class="flex items-center justify-between px-4 py-2 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50 text-xs text-slate-500 dark:text-slate-400">
                    <div class="flex items-center gap-4">
                        <span>
                            <kbd class="px-2 py-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded">↑↓</kbd> Navigate
                        </span>
                        <span>
                            <kbd class="px-2 py-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded">↵</kbd> Select
                        </span>
                    </div>
                    <span>Press <kbd class="px-2 py-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded">Cmd/Ctrl + K</kbd> to open</span>
                </div>
            </div>
        </div>
    </div>
</div>
