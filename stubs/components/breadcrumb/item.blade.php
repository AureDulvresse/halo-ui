@props([
    'href' => null,
    'active' => false,
    'icon' => null,
])

<li class="inline-flex items-center">
    @if (!$active && $href)
        <a href="{{ $href }}"
            class="inline-flex items-center gap-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
            @if ($icon)
                <x-halo::icon :name="$icon" class="w-4 h-4" />
            @endif
            {{ $slot }}
        </a>

        <svg class="w-5 h-5 text-slate-400 dark:text-slate-500 mx-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
        </svg>
    @else
        <span class="inline-flex items-center gap-2 text-sm font-medium text-slate-900 dark:text-slate-100">
            @if ($icon)
                <x-halo::icon :name="$icon" class="w-4 h-4" />
            @endif
            {{ $slot }}
        </span>
    @endif
</li>
