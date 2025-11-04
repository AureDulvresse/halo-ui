@props([
    'header' => false,
])

@if($header)
    <thead {{ $attributes->merge(['class' => 'bg-gray-50']) }}>
        <tr>
            {{ $slot }}
        </tr>
    </thead>
@else
    <tr {{ $attributes->merge(['class' => 'hover:bg-gray-50 transition-colors']) }}>
        {{ $slot }}
    </tr>
@endif