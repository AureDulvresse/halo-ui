@props([
    'label' => '',
    'value' => '',
    'change' => null,
    'changeType' => 'neutral',
    'icon' => null,
])

@php
    $changeColors = match ($changeType) {
        'positive' => 'text-green-600 dark:text-green-400',
        'negative' => 'text-red-600 dark:text-red-400',
        'neutral' => 'text-slate-600 dark:text-slate-400',
        default => 'text-slate-600 dark:text-slate-400',
    };
@endphp

<div
    {{ $attributes->merge(['class' => 'bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 p-6']) }}>
    <div class="flex items-center justify-between mb-2">
        <p class="text-sm font-medium text-slate-600 dark:text-slate-400">{{ $label }}</p>
        @if ($icon)
            <div class="p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                <x-halo::icon :name="$icon" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
            </div>
        @endif
    </div>

    <div class="flex items-end justify-between">
        <h3 class="text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $value }}</h3>

        @if ($change)
            <div class="flex items-center gap-1 {{ $changeColors }}">
                @if ($changeType === 'positive')
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                @elseif($changeType === 'negative')
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
                <span class="text-sm font-medium">{{ $change }}</span>
            </div>
        @endif
    </div>
</div>
