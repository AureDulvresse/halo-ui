@props([
    'label' => null,
    'description' => null,
    'error' => null,
    'disabled' => false,
])

@php
$baseClasses = 'w-4 h-4 border-slate-300 dark:border-slate-600 text-blue-600 dark:text-blue-500 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-0 transition-colors disabled:opacity-50 disabled:cursor-not-allowed';

$classes = halo_merge_classes($baseClasses, $attributes->get('class'));
@endphp

<div class="flex items-start gap-2">
    <div class="flex items-center h-5">
        <input
            type="radio"
            {{ $attributes->merge(['class' => $classes]) }}
            @if($disabled) disabled @endif
        />
    </div>

    @if($label || $description)
        <div class="flex-1">
            @if($label)
                <label class="text-sm font-medium text-slate-900 dark:text-slate-100 cursor-pointer">
                    {{ $label }}
                </label>
            @endif

            @if($description)
                <p class="text-sm text-slate-500 dark:text-slate-400">{{ $description }}</p>
            @endif

            @if($error)
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
            @endif
        </div>
    @endif
</div>
