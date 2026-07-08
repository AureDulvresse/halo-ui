@props([
    'name' => 'file',
    'multiple' => false,
    'accept' => null,
    'disabled' => false,
    'id' => null,
])

@php
$inputId = $id ?? uniqid('halo-file-upload-');

$classes = halo_merge_classes(
    'flex flex-col items-center justify-center gap-2 rounded-halo border-2 border-dashed border-halo-border p-8 text-center transition-colors cursor-pointer hover:border-halo-primary/50 peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-halo-ring peer-focus-visible:ring-offset-2',
    $attributes->get('class'),
);
@endphp

<div x-data="haloFileUpload()">
    <label
        for="{{ $inputId }}"
        @dragover.prevent="dragging = true"
        @dragleave.prevent="dragging = false"
        @drop.prevent="drop($event)"
        :class="dragging ? 'border-halo-primary bg-halo-primary/5' : ''"
        {{ $attributes->except(['name', 'multiple', 'accept', 'disabled', 'id', 'class'])->merge(['class' => $classes]) }}
    >
        <x-halo::icon name="upload" size="lg" class="text-halo-foreground/40" />

        <span class="text-sm text-halo-foreground/70">
            <span class="font-medium text-halo-primary">Click to browse</span> or drag and drop
        </span>

        @if($accept)
            <span class="text-xs text-halo-foreground/50">{{ $accept }}</span>
        @endif

        <input
            type="file"
            id="{{ $inputId }}"
            x-ref="input"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            @if($multiple) multiple @endif
            @if($accept) accept="{{ $accept }}" @endif
            @if($disabled) disabled @endif
            @change="change($event)"
            class="peer sr-only"
        />
    </label>

    <ul x-show="files.length > 0" x-cloak x-transition class="mt-3 space-y-2">
        <template x-for="file in files" :key="file.name + file.size">
            <li class="flex items-center justify-between gap-3 rounded-halo border border-halo-border px-3 py-2 text-sm">
                <span class="flex min-w-0 items-center gap-2">
                    <x-halo::icon name="document" size="xs" class="shrink-0 text-halo-foreground/40" aria-hidden="true" />
                    <span x-text="file.name" class="truncate text-halo-foreground"></span>
                    <span x-text="formatSize(file.size)" class="shrink-0 text-xs text-halo-foreground/50"></span>
                </span>

                <button
                    type="button"
                    @click="remove(file)"
                    aria-label="Remove file"
                    class="-m-2 shrink-0 rounded-halo p-2 text-halo-foreground/50 transition-colors hover:text-halo-danger focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring"
                >
                    <x-halo::icon name="x" size="xs" />
                </button>
            </li>
        </template>
    </ul>
</div>
