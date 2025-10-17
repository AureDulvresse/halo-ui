<div x-data="{ toasts: @json($toasts) }" class="fixed top-5 right-5 flex flex-col space-y-2 z-50">
    <template x-for="(toast, index) in toasts" :key="index">
        <div x-show="toast.show !== false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2" @mouseenter="clearTimeout(toast.timeout)"
            @mouseleave="toast.timeout = setTimeout(() => toast.show = false, 4000)"
            class="min-w-[250px] max-w-xs bg-white shadow-lg border-l-4 rounded-md p-4 flex flex-col"
            :class="{
                'border-green-500': toast.type === 'success',
                'border-red-500': toast.type === 'error',
                'border-blue-500': toast.type === 'info',
                'border-yellow-500': toast.type === 'warning'
            }">
            <div class="font-bold text-sm" x-text="toast.title"></div>
            <div class="text-sm mt-1" x-text="toast.description"></div>
            <button @click="toast.show = false"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">×</button>
        </div>
    </template>
</div>
