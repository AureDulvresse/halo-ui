<div 
    x-data="{ 
        show: false,
        x: 0,
        y: 0
    }"
    @contextmenu.prevent="
        show = true;
        x = $event.clientX;
        y = $event.clientY;
    "
    @click.away="show = false"
    {{ $attributes }}
>
    {{ $trigger ?? '' }}
    
    <div
        x-show="show"
        x-transition
        :style="`top: ${y}px; left: ${x}px`"
        class="fixed z-50 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-1"
        style="display: none;"
    >
        {{ $slot }}
    </div>
</div>