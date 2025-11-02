@props([
    /** @var string|null Label de la case à cocher */
    'label' => null,

    /** @var bool État désactivé */
    'disabled' => false,

    /** @var bool État d'erreur */
    'error' => false,

    /** @var string|null Message d'erreur */
    'errorMessage' => null,

    /** @var string|null Texte d'aide */
    'hint' => null,

    /** @var string|null Description pour l'accessibilité */
    'description' => null,
])

@php
    $stateClasses = $error
        ? 'border-danger-300 text-danger-600 focus:ring-danger-500 dark:border-danger-500 dark:text-danger-400'
        : 'border-gray-300 text-primary-600 focus:ring-primary-500 dark:border-gray-600 dark:text-primary-400';
@endphp

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input type="checkbox" {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge(['class' => "w-4 h-4 rounded transition-colors {$stateClasses} focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"]) }} />
    </div>
    @if ($label)
        <div class="ml-3 text-sm">
            <label
                class="font-medium text-gray-700 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">
                {{ $label }}
            </label>
            @if ($slot->isNotEmpty())
                <p class="text-gray-500">{{ $slot }}</p>
            @endif
        </div>
    @endif
</div>
