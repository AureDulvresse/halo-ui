@props([
    'closeable' => true,
])

<div {{ $attributes->merge(['class' => 'px-6 py-4 border-b border-gray-200']) }}>
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900">
            {{ $slot }}
        </h3>
        
        @if($closeable)
            <button
                type="button"
                @click="show = false"
                class="text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-md p-1"
            >
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>