@props([
    'href' => null,
    'active' => false,
    'icon' => null,
])

<li {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
    @if(!$loop->first)
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
    @endif
    
    @if($href && !$active)
        <a 
            href="{{ $href }}"
            class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors"
        >
            @if($icon)
                <x-icon :name="$icon" class="w-4 h-4" />
            @endif
            {{ $slot }}
        </a>
    @else
        <span class="inline-flex items-center gap-1.5 text-sm font-medium {{ $active ? 'text-gray-500' : 'text-gray-700' }}">
            @if($icon)
                <x-icon :name="$icon" class="w-4 h-4" />
            @endif
            {{ $slot }}
        </span>
    @endif
</li>