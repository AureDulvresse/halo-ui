@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'multiple' => false,
    'accept' => null,
    'maxSize' => null,
    'disabled' => false,
])

@php
    $id = $attributes->get('id', 'file-upload-' . uniqid());
@endphp

<div x-data="window.HaloUI.fileUpload({ multiple: {{ $multiple ? 'true' : 'false' }} })" class="w-full">
    @if ($label)
        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
            {{ $label }}
        </label>
    @endif

    <div @dragover.prevent="$el.classList.add('border-blue-500', 'bg-blue-50', 'dark:bg-blue-950/20')"
        @dragleave.prevent="$el.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-950/20')"
        @drop.prevent="handleFiles($event); $el.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-950/20')"
        class="border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-lg p-6 text-center transition-colors hover:border-slate-400 dark:hover:border-slate-500 bg-white dark:bg-slate-800">
        <input type="file" id="{{ $id }}" class="hidden" @if ($multiple) multiple @endif
            @if ($accept) accept="{{ $accept }}" @endif @change="handleFiles($event)"
            @if ($disabled) disabled @endif />

        <label for="{{ $id }}" class="cursor-pointer">
            <div class="flex flex-col items-center">
                <svg class="w-12 h-12 text-slate-400 dark:text-slate-500 mb-3" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>

                <p class="text-sm text-slate-600 dark:text-slate-400">
                    <span class="text-blue-600 dark:text-blue-400 font-medium">Click to upload</span>
                    or drag and drop
                </p>

                @if ($hint)
                    <p class="text-xs text-slate-500 dark:text-slate-500 mt-1">{{ $hint }}</p>
                @endif
            </div>
        </label>
    </div>

    <!-- File List -->
    <template x-if="files.length > 0">
        <div class="mt-4 space-y-2">
            <template x-for="(file, index) in files" :key="index">
                <div
                    class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-slate-100" x-text="file.name"></p>
                            <p class="text-xs text-slate-500 dark:text-slate-400"
                                x-text="(file.size / 1024).toFixed(2) + ' KB'"></p>
                        </div>
                    </div>

                    <button type="button" @click="removeFile(index)"
                        class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </template>

    @if ($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div>
