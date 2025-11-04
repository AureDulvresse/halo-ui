@props([
    'label' => null,
    'description' => null,
    'disabled' => false,
])

@php
$id = $attributes->get('id', 'switch-' . uniqid());
@endphp

<div class="flex items-center gap-3" x-data="{ enabled: {{ $attributes->get('checked', 'false') }} }">
    <button
        type="button"
        role="switch"
        :aria-checked="enabled"
        @click="enabled = !enabled; $refs.checkbox.checked = enabled; $refs.checkbox.dispatchEvent(new Event('change'))"
        :class="enabled ? 'bg-blue-600' : 'bg-slate-200'"
        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
        @if($disabled) disabled @endif
    >
        <span
            :class="enabled ? 'translate-x-5' : 'translate-x-0'"
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    <input
        type="checkbox"
        x-ref="checkbox"
        class="sr-only"
        {{ $attributes->except(['class']) }}
        @if($disabled) disabled @endif
    />

    @if($label || $description)
        <div class="flex-1">
            @if($label)
                <label for="{{ $id }}" class="text-sm font-medium text-slate-900 cursor-pointer">
                    {{ $label }}
                </label>
            @endif

            @if($description)
                <p class="text-sm text-slate-500">{{ $description }}</p>
            @endif
        </div>
    @endif
</div>
