@props([
    'size' => halo_default('select', 'size', 'md'),
    'options' => null,
    'invalid' => false,
    'disabled' => false,
    'id' => null,
    'error' => null,
    'name' => null,
    'value' => null,
    'placeholder' => 'Select...',
])

@php
$selectId = $id ?? $name ?? uniqid('halo-select-');
$errorId = $selectId.'-error';
$isInvalid = $invalid || $error;
$listId = $selectId.'-listbox';

$classes = halo_variants([
    'base' => 'flex w-full items-center justify-between gap-2 rounded-halo border bg-halo-background text-halo-foreground text-left transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring disabled:opacity-50 disabled:cursor-not-allowed',
    'variants' => [
        'size' => [
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-3 text-lg',
        ],
    ],
    'defaults' => ['size' => 'md'],
], compact('size'));

$classes = halo_merge_classes(
    $classes,
    $isInvalid ? 'border-halo-danger focus-visible:ring-halo-danger' : 'border-halo-border hover:border-halo-foreground/40',
    $attributes->get('class'),
);

// Pre-resolve the initial label server-side (when possible) so the trigger
// shows the right text on first paint, before Alpine boots.
$initialLabel = ($options && $value !== null && array_key_exists($value, $options))
    ? $options[$value]
    : null;
@endphp

{{--
    A custom-styled trigger + role="listbox" panel, not a native <select> —
    a native <select>'s option popup is rendered by the OS/browser and can't
    be restyled to match a themed, rounded field (e.g. under the Luma theme's
    pill-shaped inputs, the native popup stayed a square system dropdown).
    A hidden input mirrors the selected value for real form submission.
--}}
<div
    x-data="haloSelect(@js($value), @js($initialLabel))"
    class="relative"
    @click.outside="close()"
>
    @if($name)
        <input type="hidden" name="{{ $name }}" :value="selected">
    @endif

    <button
        type="button"
        id="{{ $selectId }}"
        @click="toggle()"
        @keydown.escape="close()"
        @keydown.arrow-down.prevent="open ? focusNext() : openPanel()"
        @keydown.arrow-up.prevent="open ? focusPrevious() : openPanel()"
        :aria-expanded="open ? 'true' : 'false'"
        aria-haspopup="listbox"
        :aria-controls="'{{ $listId }}'"
        @if($disabled) disabled @endif
        @if($isInvalid) aria-invalid="true" aria-describedby="{{ $errorId }}" @endif
        {{ $attributes->except(['size', 'options', 'invalid', 'disabled', 'id', 'error', 'class', 'name', 'value', 'placeholder'])->merge(['class' => $classes]) }}
    >
        <span :class="selectedLabel ? '' : 'text-halo-foreground/50'" x-text="selectedLabel || '{{ $placeholder }}'"></span>

        {{-- ::style (double colon) is required here, not :style — <x-halo::icon> is a
             real Blade component tag, so a single-colon attribute is evaluated as PHP
             immediately (and "open" isn't a PHP variable here). The double colon tells
             Blade to emit it as a literal attribute instead, so Alpine binds it client-side. --}}
        <x-halo::icon
            name="chevron-down"
            size="sm"
            class="shrink-0 text-halo-foreground/50 transition-transform"
            ::style="open ? 'transform: rotate(180deg)' : ''"
        />
    </button>

    <ul
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition
        id="{{ $listId }}"
        role="listbox"
        class="absolute z-40 mt-1 max-h-60 w-full overflow-auto rounded-halo border border-halo-border bg-halo-background py-1 text-halo-foreground shadow-lg"
    >
        @if($options)
            @foreach($options as $optValue => $label)
                <x-halo::select.item :value="$optValue">{{ $label }}</x-halo::select.item>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </ul>

    @if($error)
        <p id="{{ $errorId }}" class="mt-1 text-xs text-halo-danger">{{ $error }}</p>
    @endif
</div>
