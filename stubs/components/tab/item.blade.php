@props([
    'name' => '',
    'title' => '',
])

<div>
    <!-- Tab Button (use in tab navigation) -->
    <button
        type="button"
        @click="activeTab = '{{ $name }}'"
        :class="activeTab === '{{ $name }}' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
        class="py-2 px-1 border-b-2 font-medium text-sm transition-colors"
        {{ $attributes->only(['class', 'id']) }}
    >
        {{ $title }}
    </button>
    
    <!-- Tab Content -->
    <div
        x-show="activeTab === '{{ $name }}'"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        style="display: none;"
        {{ $attributes->except(['class', 'id']) }}
    >
        {{ $slot }}
    </div>
</div>