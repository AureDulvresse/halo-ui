@props([
    'separator' => 'chevron',
])

<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => 'flex']) }}>
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        {{ $slot }}
    </ol>
</nav>