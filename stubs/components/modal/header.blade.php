@props([
    'closeable' => true,
])

<div {{ $attributes->merge(['class' => 'px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white']) }}>
    <div class="flex items-center justify-between">
        <h3 class="text-xl font-bold text-gray-900 tracking-tight">
            {{ $slot }}
        </h3>

        @if ($closeable)
            <button type="button" @click="close()"
                class="ml-4 p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="sr-only">Close</span>
                <x-halo::icon name="x" size="sm" />
            </button>
        @endif
    </div>
</div>
