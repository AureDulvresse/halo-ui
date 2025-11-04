@props([
    'max' => 3,
    'size' => 'md',
])

@php
$sizeClasses = config("halo.sizes.avatar.{$size}", 'w-10 h-10');
@endphp

<div class="flex -space-x-2">
    {{ $slot }}
</div>
