@props([
    'name' => '',
    'title' => '',
])

<div class="border-b border-gray-200 last:border-b-0">
    <button
        type="button"
        @click="toggle('{{ $name }}')"
        class="flex w-full items-center justify-between px-4 py-3 text-left hover:bg-gray-50 transition-colors"
    >
        <span class="font-medium text-gray-900">{{ $title }}</span>
        <svg
            class="h-5 w-5 text-gray-500 transition-transform duration-200"
            :class="isOpen('{{ $name }}') ? 'rotate-180' : ''"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    
    <div
        x-show="isOpen('{{ $name }}')"
        x-collapse
        class="px-4 py-3 text-sm text-gray-600"
    >
        {{ $slot }}
    </div>
</div>