@props([
    'header' => false,
])

@if($header)
    <th {{ $attributes->merge(['class' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider']) }}>
        {{ $slot }}
    </th>
@else
    <td {{ $attributes->merge(['class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-900']) }}>
        {{ $slot }}
    </td>
@endif