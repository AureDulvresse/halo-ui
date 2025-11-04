@props([
    'label' => null,
    'placeholder' => 'Start writing...',
    'height' => '400px',
])

<div
    x-data="{
        content: '{{ $slot }}',
        
        execCommand(command, value = null) {
            document.execCommand(command, false, value);
            this.$refs.editor.focus();
        },
        
        insertLink() {
            const url = prompt('Enter URL:');
            if (url) {
                this.execCommand('createLink', url);
            }
        },
        
        insertImage() {
            const url = prompt('Enter image URL:');
            if (url) {
                this.execCommand('insertImage', url);
            }
        },
        
        changeColor(color) {
            this.execCommand('foreColor', color);
        },
        
        updateContent() {
            this.content = this.$refs.editor.innerHTML;
        }
    }"
    class="space-y-2"
>
    @if($label)
        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">
            {{ $label }}
        </label>
    @endif

    <!-- Toolbar -->
    <div class="flex flex-wrap items-center gap-1 p-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-t-lg">
        <!-- Text Formatting -->
        <div class="flex gap-1 pr-2 border-r border-slate-300 dark:border-slate-600">
            <button
                @click="execCommand('bold')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Bold"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                </svg>
            </button>
            
            <button
                @click="execCommand('italic')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors italic"
                title="Italic"
            >
                <span class="text-sm font-medium">I</span>
            </button>
            
            <button
                @click="execCommand('underline')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors underline"
                title="Underline"
            >
                <span class="text-sm font-medium">U</span>
            </button>
            
            <button
                @click="execCommand('strikeThrough')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors line-through"
                title="Strikethrough"
            >
                <span class="text-sm font-medium">S</span>
            </button>
        </div>

        <!-- Headings -->
        <div class="flex gap-1 pr-2 border-r border-slate-300 dark:border-slate-600">
            <button
                @click="execCommand('formatBlock', 'h1')"
                class="px-2 py-1 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors text-sm font-medium"
                title="Heading 1"
            >
                H1
            </button>
            <button
                @click="execCommand('formatBlock', 'h2')"
                class="px-2 py-1 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors text-sm font-medium"
                title="Heading 2"
            >
                H2
            </button>
            <button
                @click="execCommand('formatBlock', 'h3')"
                class="px-2 py-1 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors text-sm font-medium"
                title="Heading 3"
            >
                H3
            </button>
        </div>

        <!-- Lists -->
        <div class="flex gap-1 pr-2 border-r border-slate-300 dark:border-slate-600">
            <button
                @click="execCommand('insertUnorderedList')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Bullet List"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>
            
            <button
                @click="execCommand('insertOrderedList')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Numbered List"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <!-- Alignment -->
        <div class="flex gap-1 pr-2 border-r border-slate-300 dark:border-slate-600">
            <button
                @click="execCommand('justifyLeft')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Align Left"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h8a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h8a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>
            
            <button
                @click="execCommand('justifyCenter')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Align Center"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm2 4a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm-2 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm2 4a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>
            
            <button
                @click="execCommand('justifyRight')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Align Right"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm4 4a1 1 0 011-1h8a1 1 0 110 2H8a1 1 0 01-1-1zm-4 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm4 4a1 1 0 011-1h8a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <!-- Insert -->
        <div class="flex gap-1 pr-2 border-r border-slate-300 dark:border-slate-600">
            <button
                @click="insertLink()"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Insert Link"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"/>
                </svg>
            </button>
            
            <button
                @click="insertImage()"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Insert Image"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <!-- Color -->
        <div class="flex gap-1">
            <div x-data="{ showPicker: false }" class="relative">
                <button
                    @click="showPicker = !showPicker"
                    class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                    title="Text Color"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                    </svg>
                </button>
                
                <div
                    x-show="showPicker"
                    @click.outside="showPicker = false"
                    x-cloak
                    class="absolute z-10 mt-2 p-2 bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700"
                >
                    <div class="grid grid-cols-5 gap-2">
                        <button
                            @click="changeColor('#000000'); showPicker = false"
                            class="w-6 h-6 rounded bg-black"
                        ></button>
                        <button
                            @click="changeColor('#EF4444'); showPicker = false"
                            class="w-6 h-6 rounded bg-red-500"
                        ></button>
                        <button
                            @click="changeColor('#F59E0B'); showPicker = false"
                            class="w-6 h-6 rounded bg-amber-500"
                        ></button>
                        <button
                            @click="changeColor('#10B981'); showPicker = false"
                            class="w-6 h-6 rounded bg-green-500"
                        ></button>
                        <button
                            @click="changeColor('#3B82F6'); showPicker = false"
                            class="w-6 h-6 rounded bg-blue-500"
                        ></button>
                        <button
                            @click="changeColor('#8B5CF6'); showPicker = false"
                            class="w-6 h-6 rounded bg-purple-500"
                        ></button>
                        <button
                            @click="changeColor('#EC4899'); showPicker = false"
                            class="w-6 h-6 rounded bg-pink-500"
                        ></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Undo/Redo -->
        <div class="flex gap-1 ml-auto">
            <button
                @click="execCommand('undo')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Undo"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </button>
            
            <button
                @click="execCommand('redo')"
                class="p-2 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors"
                title="Redo"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 9H9a5 5 0 00-5 5v2a1 1 0 11-2 0v-2a7 7 0 017-7h5.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Editor -->
    <div
        x-ref="editor"
        @input="updateContent()"
        contenteditable="true"
        :style="{ height: '{{ $height }}' }"
        :placeholder="'{{ $placeholder }}'"
        class="w-full p-4 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-b-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 overflow-y-auto prose dark:prose-invert max-w-none"
    >
        {!! $slot !!}
    </div>

    <!-- Hidden Input -->
    <input type="hidden" x-model="content" {{ $attributes }} />
</div>

<style>
    [contenteditable]:empty:before {
        content: attr(placeholder);
        color: #9CA3AF;
    }
</style>