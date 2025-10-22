@props([
    'href' => null,
    'icon' => null,
])

@if($href)
    <a 
        href="{{ $href }}"
        {{ $attributes->merge(['class' => 'flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors']) }}
    >
        @if($icon)
            <x-icon :name="$icon" class="w-4 h-4" />
        @endif
        {{ $slot }}
    </a>
@else
    <button
        type="button"
        {{ $attributes->merge(['class' => 'flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors']) }}
    >
        @if($icon)
            <x-icon :name="$icon" class="w-4 h-4" />
        @endif
        {{ $slot }}
    </button>
@endif