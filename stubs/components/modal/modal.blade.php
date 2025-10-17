<div x-data="{ open: {{ $show ?? 'false' }} }" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="open = false" class="bg-white rounded-lg shadow-lg w-full max-w-lg p-4">
        {{ $slot }}
    </div>
</div>
