@props([
    'label' => null,
    'value' => null,
    'toolbar' => ['bold', 'italic', 'underline', 'link'],
])

<div x-data="{ content: '{{ $value }}' }" class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    
    <div class="border border-gray-300 rounded-lg overflow-hidden">
        <div class="flex items-center gap-1 p-2 bg-gray-50 border-b border-gray-300">
            @if(in_array('bold', $toolbar))
                <button type="button" class="p-2 hover:bg-gray-200 rounded" onclick="document.execCommand('bold')">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 5a1 1 0 011-1h5.5a3.5 3.5 0 110 7H4v3a1 1 0 11-2 0V5zm9.5 3a1.5 1.5 0 100-3H5v3h7.5z"/>
                    </svg>
                </button>
            @endif
            
            @if(in_array('italic', $toolbar))
                <button type="button" class="p-2 hover:bg-gray-200 rounded" onclick="document.execCommand('italic')">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 5a1 1 0 100 2h1.586l-3 8H5a1 1 0 100 2h6a1 1 0 100-2h-1.586l3-8H14a1 1 0 100-2H8z"/>
                    </svg>
                </button>
            @endif
            
            @if(in_array('underline', $toolbar))
                <button type="button" class="p-2 hover:bg-gray-200 rounded" onclick="document.execCommand('underline')">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 13a3 3 0 100-6 3 3 0 000 6zM3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                    </svg>
                </button>
            @endif
        </div>
        
        <div
            contenteditable="true"
            @input="content = $event.target.innerHTML"
            class="p-4 min-h-[200px] focus:outline-none"
            x-html="content"
        ></div>
    </div>
    
    <input type="hidden" x-model="content" {{ $attributes->only(['name']) }} />
</div>