@props([
    'icon' => null,
    'title' => 'No data',
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 px-4']) }}>
    @if($icon)
        <div class="w-16 h-16 text-gray-400 mb-4">
            <x-icon :name="$icon" class="w-full h-full" />
        </div>
    @else
        <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
    @endif
    
    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $title }}</h3>
    
    @if($description)
        <p class="text-sm text-gray-500 text-center mb-6 max-w-sm">{{ $description }}</p>
    @endif
    
    @if($slot->isNotEmpty())
        <div class="flex gap-3">
            {{ $slot }}
        </div>
    @endif
</div>