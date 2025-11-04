@props([
    'closeable' => true,
])

<div {{ $attributes->merge(['class' => 'flex items-center justify-between p-6 border-b border-slate-200']) }}>
    <h3 class="text-lg font-semibold text-slate-900">
        {{ $slot }}
    </h3>

    @if($closeable)
        <button
            type="button"
            @click="hide()"
            class="text-slate-400 hover:text-slate-600 transition-colors"
            aria-label="Close"
        >
            <x-dynamic-component :component="'icon-' . config('halo.icons.set', 'halo')" name="x" class="w-5 h-5" />
        </button>
    @endif
</div>
