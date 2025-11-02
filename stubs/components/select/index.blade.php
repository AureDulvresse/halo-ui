@props([
    /** @var string|null Label du champ */
    'label' => null,

    /** @var bool État d'erreur */
    'error' => false,

    /** @var bool État désactivé */
    'disabled' => false,

    /** @var string Texte par défaut affiché */
    'placeholder' => 'Select an option',

    /** @var string Taille du champ : 'sm'|'md'|'lg' */
    'size' => 'md',

    /** @var string|null Message d'erreur */
    'errorMessage' => null,

    /** @var string|null Texte d'aide */
    'hint' => null,

    /** @var string|null Description pour l'accessibilité */
    'description' => null,
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-4 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };

    $stateClasses = $error
        ? 'border-danger-300 focus:border-danger-500 focus:ring-danger-500/20'
        : 'border-gray-300 focus:border-primary-500 focus:ring-primary-500/20';

    $baseClasses =
        'block w-full rounded-xl shadow-sm transition-all duration-200' .
        ' disabled:bg-gray-50 disabled:text-gray-500 disabled:cursor-not-allowed' .
        ' focus:ring-4 appearance-none bg-white' .
        ' dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300' .
        ' dark:disabled:bg-gray-900 dark:disabled:text-gray-600' .
        ' dark:focus:ring-primary-500/10';
@endphp

<div x-data="{
    value: @json(old($attributes->get('name'), $attributes->get('value', ''))),
    focused: false
}" class="space-y-1.5">
    @if ($label)
        <label for="{{ $attributes->get('id') }}" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
            {{ $label }}
            @if ($attributes->has('required'))
                <span class="text-danger-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <select {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$stateClasses}"]) }}>
            @if ($placeholder)
                <option value="" disabled selected>{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>
