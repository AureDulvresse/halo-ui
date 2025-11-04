@props([
    'autoplay' => false,
    'interval' => 3000,
    'showControls' => true,
    'showIndicators' => true,
])

<div
    x-data="{
        currentSlide: 0,
        slides: [],
        autoplay: {{ $autoplay ? 'true' : 'false' }},
        interval: {{ $interval }},
        timer: null,
        init() {
            this.slides = Array.from(this.$refs.slides.children);
            if (this.autoplay) {
                this.startAutoplay();
            }
        },
        next() {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            this.resetAutoplay();
        },
        prev() {
            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            this.resetAutoplay();
        },
        goTo(index) {
            this.currentSlide = index;
            this.resetAutoplay();
        },
        startAutoplay() {
            this.timer = setInterval(() => this.next(), this.interval);
        },
        resetAutoplay() {
            if (this.autoplay) {
                clearInterval(this.timer);
                this.startAutoplay();
            }
        }
    }"
    {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-lg']) }}
>
    <div class="relative h-full" x-ref="slides">
        {{ $slot }}
    </div>
    
    @if($showControls)
        <button
            @click="prev()"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-lg transition-colors z-10"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <button
            @click="next()"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-lg transition-colors z-10"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    @endif
    
    @if($showIndicators)
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10">
            <template x-for="(slide, index) in slides" :key="index">
                <button
                    @click="goTo(index)"
                    class="w-2 h-2 rounded-full transition-all"
                    :class="currentSlide === index ? 'bg-white w-8' : 'bg-white/50'"
                ></button>
            </template>
        </div>
    @endif
</div>
