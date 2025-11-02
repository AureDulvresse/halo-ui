@props([
    'title' => '',
    'color' => null,
    'count' => null,
])

<div class="flex-shrink-0 w-80">
    <div class="bg-gray-100 rounded-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-900">{{ $title }}</h3>
            @if($count !== null)
                <span class="px-2 py-1 text-xs font-medium bg-gray-200 rounded-full">{{ $count }}</span>
            @endif
        </div>
        
        <div class="space-y-3">
            {{ $slot }}
        </div>
    </div>
</div>