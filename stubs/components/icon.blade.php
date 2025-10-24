@php
    $svg = $getSvg ?? $component->svg();
@endphp

@if ($svg)
    {!! $svg !!}
@else
    <span class="{{ $class ?? 'inline-block w-4 h-4 text-red-500' }}" title="Icon '{{ $name }}' not found">?</span>
@endif
