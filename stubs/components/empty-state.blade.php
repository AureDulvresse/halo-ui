@props([
    'icon' => 'inbox',
    'title' => 'No data',
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 text-center']) }}>
    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 mb-4">
        <x-halo::icon :name="$icon" class="w-8 h-8 text-slate-400 dark:text-slate-500" />
    </div>

    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-1">
        {{ $title }}
    </h3>

    @if($description)
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">
            {{ $description }}
        </p>
    @endif

    @if($slot->isNotEmpty())
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif
</div>
