@props([
    'variant' => 'primary',
    'size' => 'md',
    'dot' => false,
])

@php
    $variantClasses = match($variant) {
        'primary' => 'bg-blue-100 text-blue-800',
        'secondary' => 'bg-gray-100 text-gray-800',
        'success' => 'bg-green-100 text-green-800',
        'danger' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-cyan-100 text-cyan-800',
        default => 'bg-blue-100 text-blue-800',
    };
    
    $sizeClasses = match($size) {
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-0.5 text-sm',
        'lg' => 'px-3 py-1 text-base',
        default => 'px-2.5 py-0.5 text-sm',
    };
    
    $dotColor = match($variant) {
        'primary' => 'bg-blue-500',
        'secondary' => 'bg-gray-500',
        'success' => 'bg-green-500',
        'danger' => 'bg-red-500',
        'warning' => 'bg-yellow-500',
        'info' => 'bg-cyan-500',
        default => 'bg-blue-500',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 font-medium rounded-full {$variantClasses} {$sizeClasses}"]) }}>
    @if($dot)
        <span class="w-1.5 h-1.5 rounded-full {{ $dotColor }}"></span>
    @endif
    {{ $slot }}
</span>