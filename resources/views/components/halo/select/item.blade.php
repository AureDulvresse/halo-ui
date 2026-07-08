@props([
    'value',
])

@php
$classes = halo_merge_classes(
    'flex cursor-pointer select-none items-center justify-between gap-2 px-4 py-2 text-sm text-halo-foreground hover:bg-halo-secondary focus-visible:outline-none focus-visible:bg-halo-secondary',
    $attributes->get('class'),
);
@endphp

<li
    role="option"
    tabindex="-1"
    data-value="{{ $value }}"
    :aria-selected="isSelected('{{ $value }}').toString()"
    ::class="isSelected('{{ $value }}') ? 'bg-halo-secondary' : ''"
    @click="select('{{ $value }}', $el.textContent.trim())"
    @keydown.enter.prevent="select('{{ $value }}', $el.textContent.trim())"
    @keydown.space.prevent="select('{{ $value }}', $el.textContent.trim())"
    @keydown.arrow-down.prevent="focusNext()"
    @keydown.arrow-up.prevent="focusPrevious()"
    {{ $attributes->except(['value', 'class'])->merge(['class' => $classes]) }}
>
    <span>{{ $slot }}</span>

    {{-- ::class (double colon) is required here, not :class — <x-halo::icon> is a
         real Blade component tag, so a single-colon attribute is evaluated as PHP
         immediately (and "isSelected" isn't a PHP function). The double colon tells
         Blade to emit it as a literal attribute instead, so Alpine binds it client-side. --}}
    <x-halo::icon
        name="check"
        size="xs"
        class="shrink-0"
        ::class="isSelected('{{ $value }}') ? '' : 'invisible'"
    />
</li>
