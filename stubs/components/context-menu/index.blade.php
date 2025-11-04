@props(['items' => []])

<div x-data="{
    showMenu: false,
    x: 0,
    y: 0,
    items: {{ json_encode($items) }},
    
    openMenu(event) {
        event.preventDefault();
        this.x = event.clientX;
        this.y = event.clientY;
        this.showMenu = true;
    },
    
    closeMenu() {
        this.showMenu = false;
    },
    
    handleAction(action) {
        if (typeof action === 'function') {
            action();
        }
        this.closeMenu();
    }
}" @contextmenu.prevent="openMenu($event)" @click.outside="closeMenu()">
    
    {{ $slot }}

    <div x-show="showMenu" x-cloak :style="`left: ${x}px; top: ${y}px`" class="fixed z-50 w-56 bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700 py-1">
        <template x-for="item in items" :key="item.label">
            <div>
                <button x-show="!item.divider" @click="handleAction(item.action)" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                    <svg x-show="item.icon" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <!-- Dynamic icon path -->
                    </svg>
                    <span x-text="item.label"></span>
                    <kbd x-show="item.shortcut" class="ml-auto text-xs text-slate-500 dark:text-slate-400" x-text="item.shortcut"></kbd>
                </button>
                <hr x-show="item.divider" class="my-1 border-slate-200 dark:border-slate-700" />
            </div>
        </template>
    </div>
</div>