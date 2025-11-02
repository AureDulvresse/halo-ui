@props([
    'icon' => null,
    'shortcut' => null,
    'danger' => false,
])

<button
    type="button"
    {{ $attributes->merge(['class' => 'flex items-center justify-between w-full px-4 py-2 text-sm hover:bg-gray-100 transition-colors ' . ($danger ? 'text-red-600' : 'text-gray-700')]) }}
>
    <div class="flex items-center gap-3">
        @if($icon)
            <x-icon :name="$icon" class="w-4 h-4" />
        @endif
        <span>{{ $slot }}</span>
    </div>
    
    @if($shortcut)
        <span class="text-xs text-gray-400">{{ $shortcut }}</span>
    @endif
</button>