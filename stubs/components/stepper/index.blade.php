@props([
    'steps' => 3,
    'current' => 1,
])

<div 
    x-data="{ currentStep: {{ $current }} }"
    {{ $attributes->merge(['class' => 'space-y-8']) }}
>
    <div class="flex items-center justify-between">
        @for($i = 1; $i <= $steps; $i++)
            <div class="flex items-center" :class="$i < {{ $steps }} ? 'flex-1' : ''">
                <div class="flex items-center gap-3">
                    <div 
                        class="flex items-center justify-center w-10 h-10 rounded-full border-2 transition-colors"
                        :class="currentStep >= {{ $i }} ? 'bg-blue-600 border-blue-600 text-white' : 'border-gray-300 text-gray-500'"
                    >
                        <template x-if="currentStep > {{ $i }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </template>
                        <template x-if="currentStep <= {{ $i }}">
                            <span class="text-sm font-semibold">{{ $i }}</span>
                        </template>
                    </div>
                </div>
                @if($i < $steps)
                    <div class="flex-1 h-0.5 mx-4" :class="currentStep > {{ $i }} ? 'bg-blue-600' : 'bg-gray-300'"></div>
                @endif
            </div>
        @endfor
    </div>
    
    <div>
        {{ $slot }}
    </div>
</div>