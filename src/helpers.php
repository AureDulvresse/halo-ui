<?php

if (! function_exists('theme')) {
    /**
     * Retrieve a theme value from config.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function theme(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return config('halo.theme');
        }

        return config("halo.theme.{$key}", $default);
    }
}

if (! function_exists('halo_classes')) {
    /**
     * Generate component classes based on variant, size, and extra classes.
     *
     * @param  string  $component
     * @param  string|null  $variant
     * @param  string|null  $size
     * @param  string  $extra
     * @return string
     */
    function halo_classes(string $component, ?string $variant = null, ?string $size = null, string $extra = ''): string
    {
        $classes = [];

        // Get variant classes
        if ($variant) {
            $variantClass = config("halo.variants.{$component}.{$variant}");
            if ($variantClass) {
                $classes[] = $variantClass;
            }
        }

        // Get size classes
        if ($size) {
            $sizeClass = config("halo.sizes.{$component}.{$size}");
            if ($sizeClass) {
                $classes[] = $sizeClass;
            }
        }

        // Add extra classes
        if ($extra) {
            $classes[] = $extra;
        }

        return implode(' ', array_filter($classes));
    }
}

if (! function_exists('halo_default')) {
    /**
     * Get default config value for a component property.
     *
     * @param  string  $component
     * @param  string  $property
     * @param  mixed  $default
     * @return mixed
     */
    function halo_default(string $component, string $property, mixed $default = null): mixed
    {
        return config("halo.defaults.{$component}.{$property}", $default);
    }
}

if (! function_exists('halo_merge_classes')) {
    /**
     * Merge default and custom classes intelligently.
     *
     * @param  string  $default
     * @param  string|null  $custom
     * @return string
     */
    function halo_merge_classes(string $default, ?string $custom = null): string
    {
        if (! $custom) {
            return $default;
        }

        // Simple merge for now - can be enhanced with class conflict resolution
        return trim("{$default} {$custom}");
    }
}

if (! function_exists('halo_alpine_data')) {
    /**
     * Generate Alpine.js x-data attribute value.
     *
     * @param  string  $component
     * @param  array  $data
     * @return string
     */
    function halo_alpine_data(string $component, array $data = []): string
    {
        $dataJson = json_encode($data);
        return "window.HaloUI.{$component}({$dataJson})";
    }
}
