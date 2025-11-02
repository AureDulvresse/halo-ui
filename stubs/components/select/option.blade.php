@props([
    /** @var mixed Valeur de l'option */
    'value',

    /** @var bool Si l'option est sélectionnée */
    'selected' => false,

    /** @var bool Si l'option est désactivée */
    'disabled' => false,
])

<option value="{{ $value }}" {{ $selected ? 'selected' : '' }} {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->except(['class']) }}>
    {{ $slot }}
</option>
