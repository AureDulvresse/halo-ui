@props(['images' => []])

<div x-data="{
    images: {{ json_encode($images) }},
    currentIndex: 0,
    showLightbox: false,
    
    openLightbox(index) {
        this.currentIndex = index;
        this.showLightbox = true;
        document.body.style.overflow = 'hidden';
    },
    
    closeLightbox() {
        this.showLightbox = false;
        document.body.style.overflow = '';
    },
    
    next() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
    
    previous() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
    }
}" @keydown.escape.window="closeLightbox()" @keydown.arrow-right.window="next()" @keydown.arrow-left.window="previous()">
    
    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <template x-for="(image, index) in images" :key="index">
            <div @click="openLightbox(index)" class="relative aspect-square cursor-pointer group overflow-hidden rounded-lg">
                <img :src="image.thumb || image.src" :alt="image.alt" class="w-full h-full object-cover transition-transform group-hover:scale-110" />
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
            </div>
        </template>
    </div>

    <!-- Lightbox -->
    <div x-show="showLightbox" x-cloak class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center">
        <button @click="closeLightbox()" class="absolute top-4 right-4 p-2 text-white hover:bg-white/10 rounded-lg transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <button @click="previous()" class="absolute left-4 top-1/2 -translate-y-1/2 p-3 text-white hover:bg-white/10 rounded-lg transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 p-3 text-white hover:bg-white/10 rounded-lg transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <div class="max-w-6xl max-h-[90vh] p-4">
            <img :src="images[currentIndex].src" :alt="images[currentIndex].alt" class="max-w-full max-h-full object-contain" />
            <p class="text-center text-white mt-4" x-text="images[currentIndex].caption"></p>
        </div>

        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white text-sm">
            <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
        </div>
    </div>
</div>
