@props([
    'label' => null,
    'colors' => ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899'],
])

<div x-data="{ selected: '{{ $colors[0] }}' }" class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">{{ $label }}</label>
    @endif

    <div class="flex items-center gap-2">
        @foreach($colors as $color)
            <button
                type="button"
                @click="selected = '{{ $color }}'"
                :class="{ 'ring-2 ring-offset-2 ring-slate-900 dark:ring-slate-100': selected === '{{ $color }}' }"
                class="w-8 h-8 rounded-full transition-all"
                style="background-color: {{ $color }}"
            ></button>
        @endforeach
    </div>

    <input type="hidden" x-model="selected" {{ $attributes }} />
</div>
