@props([
    'index' => 0,
    'icon' => null,
])

<button
    type="button"
    @click="setActive({{ $index }})"
    :class="isActive({{ $index }}) ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300'"
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 px-4 py-2 border-b-2 font-medium text-sm transition-colors focus:outline-none focus:text-blue-600']) }}
    role="tab"
    :aria-selected="isActive({{ $index }})"
>
    @if($icon)
        <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" :name="$icon" class="w-4 h-4" />
    @endif

    {{ $slot }}
</button>
