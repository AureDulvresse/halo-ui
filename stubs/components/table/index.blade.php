@props([
    'striped' => false,
    'hoverable' => true,
])

<div {{ $attributes->merge(['class' => 'overflow-x-auto']) }}>
    <table class="min-w-full divide-y divide-gray-200">
        {{ $slot }}
    </table>
</div>