@props([
    'value' => 0,
    'max' => 5,
    'name' => null,
    'readonly' => false,
])

@php
$classes = halo_merge_classes('inline-flex items-center gap-1', $attributes->get('class'));
@endphp

<div
    x-data="haloRating({{ (int) $value }}, {{ (int) $max }})"
    role="radiogroup"
    aria-label="Rating"
    {{ $attributes->except(['value', 'max', 'name', 'readonly', 'class'])->merge(['class' => $classes]) }}
>
    @if($name)
        <input type="hidden" name="{{ $name }}" x-model="value" />
    @endif

    @for($i = 1; $i <= $max; $i++)
        <button
            type="button"
            @if($readonly) disabled @endif
            @click="set({{ $i }})"
            @mouseenter="hover({{ $i }})"
            @mouseleave="unhover()"
            :aria-checked="value === {{ $i }}"
            role="radio"
            class="rounded-halo p-0.5 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:cursor-not-allowed"
        >
            {{-- ::class (double colon) is required here, not :class — <x-halo::icon> is a
                 real Blade component tag, so a single-colon attribute is evaluated as PHP
                 immediately (and "hovered"/"value" aren't PHP variables here). The double
                 colon tells Blade to emit it as a literal attribute instead, so Alpine
                 binds it client-side. --}}
            <x-halo::icon
                ::class="(hovered || value) >= {{ $i }} ? 'text-halo-warning' : 'text-halo-border'"
                name="star"
                size="md"
            />
        </button>
    @endfor
</div>
