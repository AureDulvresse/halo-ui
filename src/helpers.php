<?php

if (! function_exists('theme')) {
    /**
     * Retrieve a theme value from config.
     */
    function theme(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return config('halo.theme');
        }

        return config("halo.theme.{$key}", $default);
    }
}

if (! function_exists('halo_default')) {
    /**
     * Get default config value for a component property.
     */
    function halo_default(string $component, string $property, mixed $default = null): mixed
    {
        return config("halo.defaults.{$component}.{$property}", $default);
    }
}

if (! function_exists('halo_merge_classes')) {
    /**
     * Merge class strings, keeping only the last occurrence of any utility
     * within a tracked family (bg-, text-, border-, rounded-, p{x,y,t,r,b,l}-,
     * w-, h-, gap-) so a caller-supplied class reliably overrides a
     * component's own default for that family. Everything else passes
     * through unchanged, in order.
     */
    function halo_merge_classes(?string ...$classGroups): string
    {
        $family = '/^(bg|text|border|rounded|p[xytrbl]?|w|h|gap)-/';

        // Tailwind overloads several prefixes for unrelated axes that must
        // never be deduped against each other: border-{color} vs
        // border-{side/width} (border-b, border-2, ...), rounded-{radius}
        // vs rounded-{corner} (rounded-t, rounded-tl, ...), and text-{color}
        // vs text-{size}/text-{align} (text-sm, text-lg, text-center, ...).
        // Only the color/radius axis should be deduped against a caller's
        // override; the others must always pass through untouched — this is
        // what keeps, say, a button's variant text color from being
        // silently dropped by its own size class.
        $excluded = '/^(border|rounded)-([trblxy]|tl|tr|bl|br|\d+)$|^text-(xs|sm|base|lg|\d*xl|left|center|right|justify)$/';

        $tracked = [];
        $passthrough = [];

        foreach ($classGroups as $group) {
            if (! $group) {
                continue;
            }

            foreach (preg_split('/\s+/', trim($group)) as $class) {
                if ($class === '') {
                    continue;
                }

                if (preg_match($family, $class, $matches) && ! preg_match($excluded, $class)) {
                    $tracked[$matches[1]][] = $class;
                } else {
                    $passthrough[] = $class;
                }
            }
        }

        $resolved = [];
        foreach ($tracked as $classes) {
            $resolved[] = end($classes);
        }

        return implode(' ', array_merge($resolved, $passthrough));
    }
}

if (! function_exists('halo_variants')) {
    /**
     * Resolve a component's classes from a small CVA-style recipe.
     *
     * $config shape:
     * [
     *     'base' => 'inline-flex items-center ...',
     *     'variants' => [
     *         'variant' => ['primary' => '...', 'secondary' => '...'],
     *         'size' => ['sm' => '...', 'md' => '...'],
     *     ],
     *     'defaults' => ['variant' => 'primary', 'size' => 'md'],
     * ]
     */
    function halo_variants(array $config, array $props = [], ?string $class = null): string
    {
        $classes = [$config['base'] ?? ''];

        foreach ($config['variants'] ?? [] as $key => $map) {
            $selected = $props[$key] ?? $config['defaults'][$key] ?? null;

            if ($selected !== null && isset($map[$selected])) {
                $classes[] = $map[$selected];
            }
        }

        $classes[] = $class;

        return halo_merge_classes(...$classes);
    }
}
