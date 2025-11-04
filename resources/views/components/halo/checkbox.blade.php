@props([
    'label' => null,
    'description' => null,
    'error' => null,
    'disabled' => false,
])

@php
$baseClasses = 'w-4 h-4 border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 transition-colors disabled:opacity-50 disabled:cursor-not-allowed';
$radiusClass = theme('radius.sm', 'rounded');

$classes = halo_merge_classes("{$baseClasses} {$radiusClass}", $attributes->get('class'));
@endphp

<div class="flex items-start gap-2">
    <div class="flex items-center h-5">
        <input
            type="checkbox"
            {{ $attributes->merge(['class' => $classes]) }}
            @if($disabled) disabled @endif
        />
    </div>

    @if($label || $description)
        <div class="flex-1">
            @if($label)
                <label class="text-sm font-medium text-slate-900 cursor-pointer">
                    {{ $label }}
                </label>
            @endif

            @if($description)
                <p class="text-sm text-slate-500">{{ $description }}</p>
            @endif

            @if($error)
                <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
            @endif
        </div>
    @endif
</div>
