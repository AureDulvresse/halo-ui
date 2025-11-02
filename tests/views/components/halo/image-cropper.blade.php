@props([
    'aspectRatio' => '1:1',
    'width' => null,
    'height' => null,
])

<div x-data="{ imageUrl: null }" class="space-y-4">
    <input
        type="file"
        accept="image/*"
        @change="imageUrl = URL.createObjectURL($event.target.files[0])"
        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
    />
    
    <div x-show="imageUrl" class="relative border-2 border-dashed border-gray-300 rounded-lg p-4">
        <img :src="imageUrl" class="max-w-full h-auto" />
        <div class="absolute inset-0 border-2 border-blue-500" style="aspect-ratio: {{ str_replace(':', '/', $aspectRatio) }}; max-width: 100%; margin: auto;"></div>
    </div>
</div>