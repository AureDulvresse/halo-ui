@props([
    'value' => 0,
    'max' => 5,
    'size' => 'md',
    'readonly' => false,
    'showValue' => false,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
        'xl' => 'w-8 h-8',
        default => 'w-5 h-5',
    };
@endphp

<div 
    x-data="{ 
        rating: {{ $value }}, 
        hoverRating: 0,
        readonly: {{ $readonly ? 'true' : 'false' }}
    }"
    class="flex items-center gap-2"
>
    <div class="flex items-center gap-1">
        @for($i = 1; $i <= $max; $i++)
            <button
                type="button"
                @if(!$readonly)
                    @click="rating = {{ $i }}"
                    @mouseenter="hoverRating = {{ $i }}"
                    @mouseleave="hoverRating = 0"
                @endif
                :disabled="readonly"
                class="{{ $sizeClasses }} {{ $readonly ? 'cursor-default' : 'cursor-pointer' }} focus:outline-none"
                {{ $attributes->only(['name', 'form']) }}
            >
                <svg 
                    class="w-full h-full transition-colors"
                    :class="(hoverRating >= {{ $i }} || (!hoverRating && rating >= {{ $i }})) ? 'text-yellow-400' : 'text-gray-300'"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </button>
        @endfor
    </div>
    
    @if($showValue)
        <span class="text-sm font-medium text-gray-700" x-text="rating + '/{{ $max }}'"></span>
    @endif
    
    @if(!$readonly)
        <input type="hidden" :value="rating" {{ $attributes->only(['name', 'form']) }} />
    @endif
</div>