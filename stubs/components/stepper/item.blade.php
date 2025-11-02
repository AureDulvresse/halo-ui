@props([
    'step' => 1,
    'title' => '',
    'description' => null,
])

<div 
    x-show="currentStep === {{ $step }}"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="space-y-4"
>
    <div>
        <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
        @if($description)
            <p class="text-sm text-gray-600 mt-1">{{ $description }}</p>
        @endif
    </div>
    
    <div>
        {{ $slot }}
    </div>
</div>