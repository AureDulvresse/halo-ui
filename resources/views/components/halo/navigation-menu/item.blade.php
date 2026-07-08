@props([
    'href' => null,
    'active' => false,
])

@php
$linkClasses = halo_merge_classes(
    'inline-flex items-center gap-1 rounded-halo px-3 py-2 text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring',
    $active ? 'bg-halo-secondary text-halo-foreground' : 'text-halo-foreground/70 hover:bg-halo-secondary hover:text-halo-foreground',
    $attributes->get('class'),
);

$triggerClasses = halo_merge_classes(
    'inline-flex items-center gap-1 rounded-halo px-3 py-2 text-sm font-medium text-halo-foreground/70 transition-colors hover:bg-halo-secondary hover:text-halo-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring',
    $attributes->get('class'),
);

$panelClasses = 'absolute left-0 z-40 mt-2 min-w-[12rem] rounded-halo border border-halo-border bg-halo-background p-1 text-halo-foreground shadow-lg';
@endphp

@if($href)
    <li>
        <a
            href="{{ $href }}"
            @if($active) aria-current="page" @endif
            {{ $attributes->except(['href', 'active', 'class'])->merge(['class' => $linkClasses]) }}
        >
            {{ $slot }}
        </a>
    </li>
@else
    {{--
        No href means this item opens a submenu instead of navigating — reuse
        haloPopover() rather than a near-duplicate factory, since the
        open/close/click-outside/escape/focus-return behavior needed here is
        identical to Popover.
    --}}
    <li x-data="haloPopover()" class="relative" @keydown.escape="close()">
        <button
            type="button"
            @click="toggle()"
            :aria-expanded="open ? 'true' : 'false'"
            aria-haspopup="true"
            {{ $attributes->except(['href', 'active', 'class'])->merge(['class' => $triggerClasses]) }}
        >
            {{ $trigger ?? '' }}
            <x-halo::icon
                name="chevron-down"
                size="xs"
                class="shrink-0 transition-transform"
                ::style="open ? 'transform: rotate(180deg)' : ''"
            />
        </button>

        <div
            x-ref="panel"
            x-show="open"
            x-cloak
            x-transition
            @click.outside="close()"
            role="menu"
            class="{{ $panelClasses }}"
        >
            {{ $slot }}
        </div>
    </li>
@endif
