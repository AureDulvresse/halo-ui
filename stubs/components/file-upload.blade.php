@props([
    'label' => null,
    'multiple' => false,
    'accept' => null,
    'hint' => null,
    'error' => false,
    'errorMessage' => null,
])

<div 
    x-data="{ 
        files: [],
        isDragging: false,
        handleFiles(fileList) {
            this.files = Array.from(fileList);
        }
    }"
    class="space-y-2"
>
    @if($label)
        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    
    <div
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="isDragging = false; handleFiles($event.dataTransfer.files)"
        :class="isDragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300'"
        class="relative border-2 border-dashed rounded-lg p-6 text-center hover:border-gray-400 transition-colors cursor-pointer"
    >
        <input 
            type="file"
            {{ $multiple ? 'multiple' : '' }}
            {{ $accept ? "accept={$accept}" : '' }}
            @change="handleFiles($event.target.files)"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            {{ $attributes }}
        />
        
        <div class="space-y-2">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="text-sm text-gray-600">
                <span class="font-medium text-blue-600 hover:text-blue-500">Click to upload</span>
                or drag and drop
            </div>
            @if($hint)
                <p class="text-xs text-gray-500">{{ $hint }}</p>
            @endif
        </div>
    </div>
    
    <div x-show="files.length > 0" class="space-y-2 mt-4">
        <template x-for="(file, index) in files" :key="index">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm text-gray-700" x-text="file.name"></span>
                    <span class="text-xs text-gray-500" x-text="(file.size / 1024).toFixed(2) + ' KB'"></span>
                </div>
                <button 
                    type="button"
                    @click="files.splice(index, 1)"
                    class="text-red-500 hover:text-red-700"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </template>
    </div>
    
    @if($error && $errorMessage)
        <p class="text-sm text-red-600">{{ $errorMessage }}</p>
    @endif
</div>