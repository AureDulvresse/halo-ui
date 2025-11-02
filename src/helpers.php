<?php

if (!function_exists('halo_classes')) {
    /**
     * Generate component classes based on variant, size, and extra classes.
     * Now supports gradient and glass morphism variants.
     *
     * @param  string  $component
     * @param  string|null  $variant
     * @param  string|null  $size
     * @param  string  $extra
     * @param  array  $options  Additional options like gradient, glass, glow
     * @return string
     */
    function halo_classes(string $component, ?string $variant = null, ?string $size = null, string $extra = '', array $options = []): string
    {
        $classes = [];

        // Get variant base classes
        if ($variant) {
            $variantClasses = config("halo.variants.{$component}.{$variant}");
            if ($variantClasses) {
                $classes[] = $variantClasses;
            }
        }

        // Add gradient if requested
        if (!empty($options['gradient'])) {
            $gradientClasses = config("halo.theme.colors.gradients.{$variant}", '');
            if ($gradientClasses) {
                $classes[] = "bg-gradient-to-r {$gradientClasses}";
            }
        }

        // Add glass effect if requested
        if (!empty($options['glass'])) {
            $glassClasses = config("halo.theme.colors.glass." . ($options['dark'] ? 'dark' : 'light'));
            if ($glassClasses) {
                $classes[] = $glassClasses;
            }
        }

        // Add glow effect if requested
        if (!empty($options['glow'])) {
            $glowClasses = config("halo.theme.shadows.glow.{$variant}", '');
            if ($glowClasses) {
                $classes[] = $glowClasses;
            }
        }

        // Get size classes
        if ($size) {
            $sizeClasses = config("halo.sizes.{$component}.{$size}");
            if ($sizeClasses) {
                $classes[] = $sizeClasses;
            }
        }

        // Add animation classes if specified
        if (!empty($options['animate'])) {
            $classes[] = match ($options['animate']) {
                'fade' => 'animate-fade-in',
                'scale' => 'animate-scale-in',
                'slide' => 'animate-slide-up',
                default => ''
            };
        }

        // Add extra classes
        if ($extra) {
            $classes[] = $extra;
        }

        return implode(' ', array_filter($classes));
    }
}

if (!function_exists('halo_theme')) {
    /**
     * Get a theme configuration value.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function halo_theme(string $key, mixed $default = null): mixed
    {
        return config("halo.theme.{$key}", $default);
    }
}

if (!function_exists('halo_variant_classes')) {
    /**
     * Get variant classes for a specific component.
     *
     * @param  string  $component
     * @param  string  $variant
     * @return string
     */
    function halo_variant_classes(string $component, string $variant): string
    {
        return config("halo.variants.{$component}.{$variant}", '');
    }
}

if (!function_exists('halo_size_classes')) {
    /**
     * Get size classes for a specific component.
     *
     * @param  string  $component
     * @param  string  $size
     * @return string
     */
    function halo_size_classes(string $component, string $size): string
    {
        return config("halo.sizes.{$component}.{$size}", '');
    }
}

if (!function_exists('halo_default')) {
    /**
     * Get default configuration for a component property.
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

if (!function_exists('halo_merge_classes')) {
    /**
     * Merge multiple class strings intelligently.
     *
     * @param  string  ...$classes
     * @return string
     */
    function halo_merge_classes(string ...$classes): string
    {
        return implode(' ', array_filter($classes));
    }
}
