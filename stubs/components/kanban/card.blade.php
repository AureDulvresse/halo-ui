@props([
    'title' => null,
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg p-4 shadow-sm border border-gray-200 cursor-move hover:shadow-md transition-shadow']) }}>
    @if($title)
        <h4 class="font-medium text-gray-900 mb-2">{{ $title }}</h4>
    @endif
    
    @if($description)
        <p class="text-sm text-gray-600 mb-3">{{ $description }}</p>
    @endif
    
    {{ $slot }}
</div>