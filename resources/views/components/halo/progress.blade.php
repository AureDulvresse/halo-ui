@props([
    'value' => 0,
    'max' => 100,
    'indeterminate' => false,
])

@php
$percent = max(0, min(100, $max > 0 ? ($value / $max) * 100 : 0));

$trackClasses = halo_merge_classes(
    'h-2 w-full overflow-hidden rounded-full bg-halo-secondary',
    $attributes->get('class'),
);

$barClasses = halo_merge_classes(
    'h-full rounded-full bg-halo-primary',
    $indeterminate ? 'w-1/3 animate-halo-progress-indeterminate' : 'transition-[width] duration-300',
);
@endphp

<div
    role="progressbar"
    aria-valuemin="0"
    aria-valuemax="{{ $max }}"
    @unless($indeterminate)
        aria-valuenow="{{ $value }}"
    @endunless
    {{ $attributes->except(['value', 'max', 'indeterminate', 'class'])->merge(['class' => $trackClasses]) }}
>
    <div class="{{ $barClasses }}" @unless($indeterminate) style="width: {{ $percent }}%" @endunless></div>
</div>
