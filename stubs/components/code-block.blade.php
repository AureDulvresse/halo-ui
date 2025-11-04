@props([
    'language' => 'php',
    'copyable' => true,
])

<div
    x-data="{ copied: false }"
    class="relative group"
>
    @if($copyable)
        <button
            @click="
                navigator.clipboard.writeText($refs.code.textContent.trim());
                copied = true;
                setTimeout(() => copied = false, 2000);
            "
            class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity px-3 py-1.5 text-xs font-medium text-white bg-slate-700 hover:bg-slate-600 rounded-md"
        >
            <span x-show="!copied">Copy</span>
            <span x-show="copied" x-cloak>Copied!</span>
        </button>
    @endif

    <pre class="bg-slate-900 dark:bg-slate-950 text-slate-100 p-4 rounded-lg overflow-x-auto"><code x-ref="code" class="language-{{ $language }}">{{ $slot }}</code></pre>
</div>
