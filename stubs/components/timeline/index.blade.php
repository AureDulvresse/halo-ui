@props([
    'variant' => 'default',
])

<ol {{ $attributes->merge(['class' => 'relative border-l border-slate-200 dark:border-slate-700']) }}>
    {{ $slot }}
</ol>

<!-- resources/views/components/halo/timeline/item.blade.php -->
@props([
    'icon' => null,
    'title' => '',
    'date' => null,
    'active' => false,
])

<li class="mb-10 ml-6">
    <span class="absolute flex items-center justify-center w-8 h-8 {{ $active ? 'bg-blue-100 dark:bg-blue-900' : 'bg-slate-100 dark:bg-slate-800' }} rounded-full -left-4 ring-4 ring-white dark:ring-slate-900">
        @if($icon)
            <x-halo::icon :name="$icon" class="w-4 h-4 {{ $active ? 'text-blue-600 dark:text-blue-400' : 'text-slate-500 dark:text-slate-400' }}" />
        @else
            <svg class="w-3 h-3 {{ $active ? 'text-blue-600 dark:text-blue-400' : 'text-slate-500 dark:text-slate-400' }}" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
        @endif
    </span>

    <div class="flex items-center justify-between mb-1">
        <h3 class="font-semibold text-slate-900 dark:text-slate-100">
            {{ $title }}
        </h3>

        @if($date)
            <time class="text-sm text-slate-500 dark:text-slate-400">{{ $date }}</time>
        @endif
    </div>

    <div class="text-sm text-slate-700 dark:text-slate-300">
        {{ $slot }}
    </div>
</li>
