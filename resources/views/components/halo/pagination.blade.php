@props([
    'current' => 1,
    'total' => 1,
    'baseUrl' => '',
    'window' => 2,
])

@php
$classes = halo_merge_classes('flex items-center gap-1', $attributes->get('class'));

$linkClasses = 'inline-flex h-9 min-w-9 items-center justify-center rounded-halo px-2 text-sm font-medium text-halo-foreground transition-colors hover:bg-halo-secondary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-halo-ring';
$activeClasses = 'inline-flex h-9 min-w-9 items-center justify-center rounded-halo px-2 text-sm font-medium bg-halo-primary text-halo-primary-foreground';
$disabledClasses = 'inline-flex h-9 min-w-9 items-center justify-center rounded-halo px-2 text-sm font-medium text-halo-foreground/30 pointer-events-none';

$urlFor = fn (int $page) => str_replace(':page', (string) $page, $baseUrl);

// Always show the first page, the last page, the current page, and
// `window` pages on either side of the current page. Everything else is
// collapsed behind an ellipsis rather than rendering every page link.
$pages = collect(range(1, $total))->filter(
    fn (int $page) => $page === 1 || $page === $total || abs($page - $current) <= $window
)->values();
@endphp

<nav aria-label="Pagination" {{ $attributes->except(['current', 'total', 'base-url', 'window', 'class'])->merge(['class' => $classes]) }}>
    <ul class="flex items-center gap-1">
        <li>
            @if($current <= 1)
                <span class="{{ $disabledClasses }}" aria-disabled="true">
                    <x-halo::icon name="chevron-left" size="sm" />
                </span>
            @else
                <a href="{{ $urlFor($current - 1) }}" class="{{ $linkClasses }}" rel="prev">
                    <x-halo::icon name="chevron-left" size="sm" />
                </a>
            @endif
        </li>

        @foreach($pages as $index => $page)
            @if($index > 0 && $page - $pages[$index - 1] > 1)
                <li>
                    <span class="{{ $linkClasses }} pointer-events-none">&hellip;</span>
                </li>
            @endif

            <li>
                @if($page === $current)
                    <a href="{{ $urlFor($page) }}" class="{{ $activeClasses }}" aria-current="page">{{ $page }}</a>
                @else
                    <a href="{{ $urlFor($page) }}" class="{{ $linkClasses }}">{{ $page }}</a>
                @endif
            </li>
        @endforeach

        <li>
            @if($current >= $total)
                <span class="{{ $disabledClasses }}" aria-disabled="true">
                    <x-halo::icon name="chevron-right" size="sm" />
                </span>
            @else
                <a href="{{ $urlFor($current + 1) }}" class="{{ $linkClasses }}" rel="next">
                    <x-halo::icon name="chevron-right" size="sm" />
                </a>
            @endif
        </li>
    </ul>
</nav>
