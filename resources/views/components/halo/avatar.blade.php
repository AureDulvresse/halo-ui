@props([
    'src' => null,
    'alt' => '',
    'size' => 'md',
    'initials' => null,
    'status' => null, // 'online', 'offline', 'busy', 'away'
])

@php
$sizeClasses = match($size) {
    'xs' => 'w-6 h-6 text-xs',
    'sm' => 'w-8 h-8 text-sm',
    'md' => 'w-10 h-10 text-base',
    'lg' => 'w-12 h-12 text-lg',
    'xl' => 'w-16 h-16 text-xl',
    '2xl' => 'w-20 h-20 text-2xl',
    default => 'w-10 h-10 text-base',
};

$statusColors = match($status) {
    'online' => 'bg-green-500',
    'offline' => 'bg-slate-400',
    'busy' => 'bg-red-500',
    'away' => 'bg-amber-500',
    default => null,
};

$statusSize = match($size) {
    'xs' => 'w-1.5 h-1.5',
    'sm' => 'w-2 h-2',
    'md' => 'w-2.5 h-2.5',
    'lg' => 'w-3 h-3',
    'xl' => 'w-4 h-4',
    '2xl' => 'w-5 h-5',
    default => 'w-2.5 h-2.5',
};

$baseClasses = 'relative inline-flex items-center justify-center overflow-hidden rounded-full bg-slate-200';

$classes = halo_merge_classes("{$baseClasses} {$sizeClasses}", $attributes->get('class'));
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover" />
    @elseif($initials)
        <span class="font-semibold text-slate-700">{{ $initials }}</span>
    @else
        <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" name="user" class="w-1/2 h-1/2 text-slate-500" />
    @endif

    @if($status)
        <span class="absolute bottom-0 right-0 block {{ $statusSize }} {{ $statusColors }} rounded-full ring-2 ring-white"></span>
    @endif
</div>
