@props([
    'name' => 'image',
    'multiple' => false,
    'disabled' => false,
    'id' => null,
])

@php
$inputId = $id ?? uniqid('halo-image-upload-');

$classes = halo_merge_classes(
    'flex flex-col items-center justify-center gap-2 rounded-halo border-2 border-dashed border-halo-border p-8 text-center transition-colors cursor-pointer hover:border-halo-primary/50 peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-halo-ring peer-focus-visible:ring-offset-2',
    $attributes->get('class'),
);
@endphp

<div x-data="haloImageUpload()">
    <label
        for="{{ $inputId }}"
        @dragover.prevent="dragging = true"
        @dragleave.prevent="dragging = false"
        @drop.prevent="drop($event)"
        :class="dragging ? 'border-halo-primary bg-halo-primary/5' : ''"
        {{ $attributes->except(['name', 'multiple', 'disabled', 'id', 'class'])->merge(['class' => $classes]) }}
    >
        <x-halo::icon name="image" size="lg" class="text-halo-foreground/40" />

        <span class="text-sm text-halo-foreground/70">
            <span class="font-medium text-halo-primary">Click to browse</span> or drag and drop an image
        </span>

        <input
            type="file"
            id="{{ $inputId }}"
            x-ref="input"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            accept="image/*"
            @if($multiple) multiple @endif
            @if($disabled) disabled @endif
            @change="change($event)"
            class="peer sr-only"
        />
    </label>

    <div x-show="files.length > 0" x-cloak x-transition class="mt-3 grid grid-cols-3 gap-3 sm:grid-cols-4">
        <template x-for="file in files" :key="file.name + file.size">
            <div class="group relative aspect-square overflow-hidden rounded-halo border border-halo-border">
                <img :src="file.preview" :alt="file.name" class="h-full w-full object-cover" />

                <button
                    type="button"
                    @click="remove(file)"
                    aria-label="Remove image"
                    class="absolute right-1 top-1 rounded-halo bg-halo-foreground/60 p-1.5 text-white opacity-0 transition-opacity hover:bg-halo-foreground/80 focus-visible:opacity-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring group-hover:opacity-100"
                >
                    <x-halo::icon name="x" size="xs" />
                </button>
            </div>
        </template>
    </div>
</div>
