@props([
    'size' => 'md',
    'label' => null,
])

@php
$sizeClass = match($size) {
    'xs' => 'w-3 h-3',
    'sm' => 'w-4 h-4',
    'md' => 'w-6 h-6',
    'lg' => 'w-8 h-8',
    'xl' => 'w-12 h-12',
    default => 'w-6 h-6',
};

$classes = halo_merge_classes("animate-spin {$sizeClass}", $attributes->get('class'));
@endphp

<div class="inline-flex items-center gap-2">
    <svg
        {{ $attributes->merge(['class' => $classes]) }}
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        role="status"
        aria-label="{{ $label ?? 'Loading' }}"
    >
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>

    @if($label)
        <span class="text-sm text-slate-600">{{ $label }}</span>
    @endif
</div>
