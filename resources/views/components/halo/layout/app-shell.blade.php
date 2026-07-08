@props([
    'sidebarWidth' => 'w-64',
])

@php
$classes = halo_merge_classes('min-h-screen bg-halo-background lg:flex', $attributes->get('class'));
@endphp

{{--
    Sidebar state (`sidebarOpen`) is plain local x-data, not a named
    Alpine.data() factory in init.js — the sidebar/topbar/content slots
    render as children of this element, so they inherit the scope
    naturally. A toggle button placed anywhere inside (typically the
    topbar slot) can reach it with @click="sidebarOpen = !sidebarOpen".

    The sidebar reserves its own space via the `lg:flex` flow above (it's
    `lg:static` and a flex item) rather than the content area calculating a
    matching padding — that would require the padding class to stay in sync
    with `sidebarWidth` by hand.
--}}
<div x-data="{ sidebarOpen: false }" {{ $attributes->except(['sidebarWidth', 'class'])->merge(['class' => $classes]) }}>
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        x-cloak
        class="fixed inset-0 z-40 bg-halo-foreground/50 lg:hidden"
        @click="sidebarOpen = false"
        aria-hidden="true"
    ></div>

    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="{{ $sidebarWidth }} fixed inset-y-0 left-0 z-50 border-r border-halo-border bg-halo-background transition-transform lg:static lg:z-auto lg:shrink-0"
    >
        {{ $sidebar ?? '' }}
    </aside>

    <div class="flex min-h-screen flex-1 flex-col">
        <header class="flex items-center gap-4 border-b border-halo-border bg-halo-background px-4 py-3">
            <button
                type="button"
                @click="sidebarOpen = !sidebarOpen"
                :aria-expanded="sidebarOpen ? 'true' : 'false'"
                aria-label="Toggle sidebar"
                class="-m-2 rounded-halo p-2 text-halo-foreground/70 transition-colors hover:text-halo-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring lg:hidden"
            >
                <x-halo::icon name="menu" size="md" />
            </button>

            <div class="flex flex-1 items-center gap-4">
                {{ $topbar ?? '' }}
            </div>
        </header>

        <main class="flex-1 p-4 lg:p-6">
            {{ $slot }}
        </main>
    </div>
</div>
