@props([
    /** @var string Icon name without prefix (e.g. 'user' for 'heroicon-o-user') */
    'name' => '',

    /** @var string Size variant: 'xs'|'sm'|'md'|'lg'|'xl'|'2xl' */
    'size' => 'md',

    /** @var string|null Icon set prefix (e.g. 'heroicon-o'). Uses config default if null */
    'type' => null,

    /** @var string|null Color variant or Tailwind color. Uses current text color if null */
    'color' => null,

    /** @var string|null Accessibility label for the icon (optional) */
    'label' => null,
])

@php
    // Ensure variables are available whether this view is rendered directly (anonymous) or
    // via the class-based component (Icon::render passes precomputed variables).
    $type = $type ?? config('halo.design.icons.default_set', 'heroicon-o');

    if (! isset($sizeClasses)) {
    $sizeClasses = match($size) {
    'xs' => 'w-3 h-3',
    'sm' => 'w-4 h-4',
    'md' => 'w-5 h-5',
    'lg' => 'w-6 h-6',
    'xl' => 'w-8 h-8',
    '2xl' => 'w-10 h-10',
    default => 'w-5 h-5',
    };
    }

    if (! isset($colorClasses)) {
    if (! $color) {
    $colorClasses = 'text-current';
    } else {
    // Map semantic colors to design system values
    $colorClasses = match($color) {
    'primary' => 'text-primary-600',
    'secondary' => 'text-gray-600',
    'success' => 'text-success-600',
    'danger' => 'text-danger-600',
    'warning' => 'text-warning-600',
    'info' => 'text-info-600',
    // Support direct Tailwind color classes
    default => str_starts_with($color, 'text-') ? $color : "text-{$color}",
    };
    }
    } if (! isset($componentName)) {
    $componentName = "{$type}-{$name}";
    }

    if (! isset($hasBladeIcons)) {
    $hasBladeIcons = class_exists(\BladeUI\Icons\BladeIconsServiceProvider::class);
    }
endphp

@if ($hasBladeIcons)
    @if (View::exists("components.{$componentName}"))
        <x-dynamic-component :component="$componentName" {{ $attributes->merge(['class' => "{$sizeClasses} {$colorClasses}"]) }}
            aria-hidden="{{ $label ? 'false' : 'true' }}"
            @if ($label) aria-label="{{ $label }}" @endif />
    @else
        {{-- Fallback: show placeholder with component name --}}
        <span
            {{ $attributes->merge(['class' => "inline-flex items-center justify-center {$sizeClasses} {$colorClasses} border border-dashed border-current rounded"]) }}
            title="Icon: {{ $componentName }}" role="img"
            @if ($label) aria-label="{{ $label }}" @endif>
            <span class="text-xs font-mono">?</span>
        </span>
    @endif
@elseif(config('halo.design.icons.fallback_enabled', true))
    {{-- Fallback SVG when Blade UI Kit not installed --}}
    <svg {{ $attributes->merge(['class' => "{$sizeClasses} {$colorClasses}"]) }} fill="none" stroke="currentColor"
        viewBox="0 0 24 24" aria-hidden="{{ $label ? 'false' : 'true' }}"
        @if ($label) aria-label="{{ $label }}" role="img" @endif
        @switch($name)
            @case('check')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            @break

            @case('x')
            @case('close')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            @break

            @case('plus')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            @break

            @case('minus')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
            @break

            @case('chevron-down')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            @break

            @case('chevron-up')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            @break

            @case('chevron-left')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            @break

            @case('chevron-right')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            @break

            @case('search')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            @break

            @case('user')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            @break

            @case('heart')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            @break

            @case('star')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            @break

            @default
                {{-- Generic icon placeholder --}}
                <circle cx="12" cy="12" r="10" stroke-width="2" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01" />
        @endswitch
        </svg>
    @else
        {{-- No fallback enabled --}}
        <span class="text-red-500 text-xs">Icon: {{ $name }}</span>
@endif
