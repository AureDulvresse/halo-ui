@props([
    'orientation' => 'horizontal', // 'horizontal', 'vertical'
    'text' => null,
])

@if($orientation === 'vertical')
    <div {{ $attributes->merge(['class' => 'inline-block h-full w-px bg-slate-200']) }}></div>
@else
    @if($text)
        <div {{ $attributes->merge(['class' => 'relative flex items-center py-4']) }}>
            <div class="grow border-t border-slate-200"></div>
            <span class="shrink mx-4 text-sm text-slate-500">{{ $text }}</span>
            <div class="grow border-t border-slate-200"></div>
        </div>
    @else
        <hr {{ $attributes->merge(['class' => 'border-t border-slate-200']) }} />
    @endif
@endif
