@props(['items' => [], 'autoplay' => true, 'interval' => 3000])

<div x-data="{
    currentIndex: 0,
    items: {{ json_encode($items) }},
    autoplayInterval: null,
    
    next() {
        this.currentIndex = (this.currentIndex + 1) % this.items.length;
    },
    
    previous() {
        this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
    },
    
    goTo(index) {
        this.currentIndex = index;
    },
    
    startAutoplay() {
        if ({{ $autoplay ? 'true' : 'false' }}) {
            this.autoplayInterval = setInterval(() => this.next(), {{ $interval }});
        }
    },
    
    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
        }
    }
}" x-init="startAutoplay()" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()" class="relative">
    
    <!-- Slides -->
    <div class="relative overflow-hidden rounded-lg">
        <template x-for="(item, index) in items" :key="index">
            <div x-show="currentIndex === index" x-transition class="relative h-96">
                <img :src="item.image" :alt="item.alt" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                    <div>
                        <h3 class="text-2xl font-bold text-white" x-text="item.title"></h3>
                        <p class="text-white/90" x-text="item.description"></p>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Navigation -->
    <button @click="previous()" class="absolute left-4 top-1/2 -translate-y-1/2 p-2 bg-white/80 dark:bg-slate-800/80 rounded-full hover:bg-white dark:hover:bg-slate-800 transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 p-2 bg-white/80 dark:bg-slate-800/80 rounded-full hover:bg-white dark:hover:bg-slate-800 transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- Indicators -->
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
        <template x-for="(item, index) in items" :key="index">
            <button @click="goTo(index)" :class="currentIndex === index ? 'w-8 bg-white' : 'w-2 bg-white/50'" class="h-2 rounded-full transition-all"></button>
        </template>
    </div>
</div>