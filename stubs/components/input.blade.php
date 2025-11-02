@props([
    /** @var string Type de l'input HTML (text, email, password, etc.) */
    'type' => 'text',

    /** @var string Taille du champ : 'sm'|'md'|'lg' */
    'size' => 'md',

    /** @var bool État d'erreur */
    'error' => false,

    /** @var bool État désactivé */
    'disabled' => false,

    /** @var string|null Label du champ */
    'label' => null,

    /** @var string|null Texte d'aide sous le champ */
    'hint' => null,

    /** @var string|null Message d'erreur */
    'errorMessage' => null,

    /** @var string|null Nom de l'icône à afficher */
    'icon' => null,

    /** @var string Position de l'icône : 'left'|'right' */
    'iconPosition' => 'left',

    /** @var bool Afficher un bouton pour effacer le contenu */
    'clearable' => false,

    /** @var string|null Description pour l'accessibilité */
    'description' => null,
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2.5 text-base',
        'lg' => 'px-5 py-3 text-lg',
        default => 'px-4 py-2.5 text-base',
    };

    // Utiliser les couleurs du design system
    $stateClasses = $error
        ? 'border-danger-300 focus:border-danger-500 focus:ring-danger-500/20 bg-danger-50'
        : 'border-gray-300 focus:border-primary-500 focus:ring-primary-500/20';

    $baseClasses =
        'block w-full rounded-xl shadow-sm transition-all duration-200' .
        ' disabled:bg-gray-50 disabled:text-gray-500 disabled:cursor-not-allowed focus:ring-4' .
        ' dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300' .
        ' dark:disabled:bg-gray-900 dark:disabled:text-gray-600' .
        ' dark:focus:ring-primary-500/10';

    $hasIcon = $icon !== null;
    $paddingClass = '';

    if ($hasIcon) {
        $paddingClass = $iconPosition === 'left' ? 'pl-11' : 'pr-11';
    }

    if ($clearable) {
        $paddingClass .= ' pr-11';
    }
@endphp

<div x-data="{
    value: @json(old($attributes->get('name'), $attributes->get('value', ''))),
    showClear: {{ $clearable ? 'true' : 'false' }},
    focused: false,
    get hasClearButton() {
        return this.showClear && this.value?.length > 0;
    },
    clear() {
        this.value = '';
        this.$refs.input.focus();
        this.$dispatch('input-cleared');
    },
    init() {
        this.$watch('value', value => {
            this.$dispatch('input-changed', { value });
        });
    }
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
        @if ($icon)
            <div
                class="absolute inset-y-0 {{ $iconPosition === 'left' ? 'left-0 pl-3' : 'right-0 pr-3' }} flex items-center pointer-events-none">
                <x-halo::icon :name="$icon" size="sm" class="text-gray-400" />
            </div>
        @endif

        <input type="{{ $type }}" x-model="value" x-ref="input" @focus="focused = true" @blur="focused = false"
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge([
                'class' => "{$baseClasses} {$sizeClasses} {$stateClasses} {$paddingClass}",
                'aria-invalid' => $error ? 'true' : 'false',
                'aria-describedby' =>
                    $error && $errorMessage ? "{$attributes->get('id')}-error" : ($hint ? "{$attributes->get('id')}-hint" : null),
            ]) }} />

        @if ($clearable)
            <button x-show="hasClearButton" @click="clear()" type="button"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                tabindex="-1">
                <x-halo::icon name="x" size="sm" />
            </button>
        @endif
    </div>

    @if ($hint && !$error)
        <p id="{{ $attributes->get('id') }}-hint"
            class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
            <x-halo::icon name="information-circle" size="xs" class="text-gray-400 dark:text-gray-500" />
            {{ $hint }}
        </p>
    @endif

    @if ($error && $errorMessage)
        <p id="{{ $attributes->get('id') }}-error"
            class="text-sm text-danger-600 dark:text-danger-400 flex items-center gap-1 font-medium" role="alert">
            <x-halo::icon name="exclamation-circle" size="xs" class="text-danger-500" />
            {{ $errorMessage }}
        </p>
    @endif

    @if ($description)
        <p id="{{ $attributes->get('id') }}-description" class="sr-only">
            {{ $description }}
        </p>
    @endif
</div>
