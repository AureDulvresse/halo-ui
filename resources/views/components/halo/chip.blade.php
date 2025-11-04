@props([
    'variant' => 'default',
    'size' => 'md',
    'removable' => false,
    'avatar' => null,
    'glass' => false,
    'animate' => null,
])

@php
    $variantClasses = match ($variant) {
        'primary' => 'bg-blue-100 text-blue-800 border-blue-200',
        'success' => 'bg-green-100 text-green-800 border-green-200',
        'danger' => 'bg-red-100 text-red-800 border-red-200',
        'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
        default => 'bg-gray-100 text-gray-800 border-gray-200',
    };

    $sizeClasses = match ($size) {
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-4 py-2 text-base',
        default => 'px-3 py-1.5 text-sm',
    };

    $classes = trim(
        'inline-flex items-center gap-2 rounded-full border font-medium ' .
            $variantClasses .
            ' ' .
            $sizeClasses .
            ' ' .
            halo_classes('chip', $variant, $size, $attributes->get('class'), [
                'glass' => $glass,
                'animate' => $animate,
                'dark' => $glass && isset($attributes['dark']),
            ]),
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if ($avatar)
        <img src="{{ $avatar }}" class="w-5 h-5 rounded-full" alt="" />
    @endif

    <span>{{ $slot }}</span>

    @if ($removable)
        <button type="button" class="hover:bg-black/10 rounded-full p-0.5 transition-colors"
            @click="$el.closest('[class*=chip]').remove()">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </button>
    @endif
</div>
