@props([
    'pressed' => false,
    'variant' => halo_default('toggle', 'variant', 'default'),
    'size' => halo_default('toggle', 'size', 'md'),
    'icon' => null,
])

@php
$classes = halo_variants([
    'base' => 'inline-flex items-center justify-center gap-2 rounded-halo border border-transparent font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:opacity-50 disabled:cursor-not-allowed',
    'variants' => [
        'variant' => [
            'default' => 'bg-transparent text-halo-foreground hover:bg-halo-secondary',
            'outline' => 'bg-transparent text-halo-foreground border-halo-border hover:bg-halo-secondary',
        ],
        'size' => [
            'sm' => 'px-2.5 py-1 text-sm',
            'md' => 'px-3 py-1.5 text-base',
            'lg' => 'px-4 py-2 text-lg',
        ],
    ],
    'defaults' => ['variant' => 'default', 'size' => 'md'],
], compact('variant', 'size'), $attributes->get('class'));
@endphp

{{-- A single standalone pressed/unpressed control (WAI-ARIA button pattern with
     aria-pressed) — not a checkbox, so state is tracked with a plain boolean
     and toggled on click rather than bound to a form value. --}}
<button
    type="button"
    x-data="{ pressed: {{ $pressed ? 'true' : 'false' }} }"
    @click="pressed = !pressed"
    :aria-pressed="pressed.toString()"
    :class="pressed ? 'bg-halo-secondary text-halo-secondary-foreground' : ''"
    {{ $attributes->except(['pressed', 'variant', 'size', 'icon', 'class'])->merge(['class' => $classes]) }}
>
    @if($icon)
        <x-halo::icon :name="$icon" size="sm" />
    @endif

    {{ $slot }}
</button>
