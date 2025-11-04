@props([
    'name' => '',
    'height' => 'auto',
])

<div
    x-data="{
        show: false,
        name: '{{ $name }}'
    }"
    x-show="show"
    @open-bottom-sheet.window="show = ($event.detail.name === name)"
    @close-bottom-sheet.window="show = false"
    @keydown.escape.window="show = false"
    class="fixed inset-0 z-50"
    style="display: none;"
    x-cloak
>
    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        @click="show = false"
        class="absolute inset-0 bg-black/50"
    ></div>
    
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        class="absolute bottom-0 left-0 right-0 bg-white rounded-t-2xl shadow-xl"
        style="max-height: {{ $height === 'auto' ? '80vh' : $height }};"
        @click.stop
    >
        <div class="flex justify-center pt-3 pb-2">
            <div class="w-12 h-1.5 bg-gray-300 rounded-full"></div>
        </div>
        
        <div class="overflow-y-auto" style="max-height: calc(80vh - 2rem);">
            {{ $slot }}
        </div>
    </div>
</div>