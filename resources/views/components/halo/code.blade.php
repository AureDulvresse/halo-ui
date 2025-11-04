@props([
    'language' => null,
    'showLineNumbers' => false,
    'copyable' => true,
])

<div
    x-data="{
        copied: false,
        copyCode() {
            const code = this.$refs.code.textContent;
            navigator.clipboard.writeText(code);
            this.copied = true;
            setTimeout(() => this.copied = false, 2000);
        }
    }"
    {{ $attributes->merge(['class' => 'relative group']) }}
>
    @if($copyable)
        <button
            @click="copyCode()"
            class="absolute top-2 right-2 p-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md opacity-0 group-hover:opacity-100 transition-opacity z-10"
        >
            <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            <svg x-show="copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </button>
    @endif

    <pre class="bg-gray-900 text-gray-100 rounded-lg p-4 overflow-x-auto"><code x-ref="code" class="{{ $language ? "language-{$language}" : '' }}">{{ $slot }}</code></pre>
</div>
