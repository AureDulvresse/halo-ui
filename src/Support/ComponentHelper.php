<?php

declare(strict_types=1);

namespace Halo\UI\Support;

class ComponentHelper
{
    /**
     * Get variant classes for a given color scheme.
     */
    public static function getVariantClasses(string $variant, string $type = 'button'): string
    {
        $variants = [
            'button' => [
                'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent
focus:ring-blue-500',
                'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-900 border-transparent
focus:ring-gray-500',
                'success' => 'bg-green-600 hover:bg-green-700 text-white border-transparent
focus:ring-green-500',
                'danger' => 'bg-red-600 hover:bg-red-700 text-white border-transparent
focus:ring-red-500',
                'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white border-transparent
focus:ring-yellow-500',
                'info' => 'bg-cyan-600 hover:bg-cyan-700 text-white border-transparent
focus:ring-cyan-500',
            ],
            'badge' => [
                'primary' => 'bg-blue-100 text-blue-800',
                'secondary' => 'bg-gray-100 text-gray-800',
                'success' => 'bg-green-100 text-green-800',
                'danger' => 'bg-red-100 text-red-800',
                'warning' => 'bg-yellow-100 text-yellow-800',
                'info' => 'bg-cyan-100 text-cyan-800',
            ],
            'alert' => [
                'success' => 'bg-green-50 text-green-800 border-green-200',
                'danger' => 'bg-red-50 text-red-800 border-red-200',
                'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
                'info' => 'bg-blue-50 text-blue-800 border-blue-200',
            ],
        ];
        return $variants[$type][$variant] ?? $variants[$type]['primary'] ?? '';
    }
    /**
     * Get size classes for components.
     */
    public static function getSizeClasses(string $size, string $type = 'button'): string
    {
        $sizes = [
            'button' => [
                'xs' => 'px-2.5 py-1.5 text-xs',
                'sm' => 'px-3 py-2 text-sm',
                'md' => 'px-4 py-2.5 text-base',
                'lg' => 'px-5 py-3 text-lg',
                'xl' => 'px-6 py-3.5 text-xl',
            ],
            'input' => [
                'sm' => 'px-3 py-1.5 text-sm',
                'md' => 'px-4 py-2 text-base',
                'lg' => 'px-4 py-3 text-lg',
            ],
            'badge' => [
                'sm' => 'px-2 py-0.5 text-xs',
                'md' => 'px-2.5 py-0.5 text-sm',
                'lg' => 'px-3 py-1 text-base',
            ],
        ];
        return $sizes[$type][$size] ?? $sizes[$type]['md'] ?? '';
    }
    /**
     * Merge CSS classes intelligently.
     */
    public static function mergeClasses(string ...$classes): string
    {
        return implode(' ', array_filter($classes));
    }
    /**
     * Get theme color from config.
     */
    public static function getThemeColor(string $key): string
    {
        return config("halo.theme.colors.{$key}", 'blue');
    }
    /**
     * Get default border radius from config.
     */
    public static function getDefaultRadius(): string
    {
        $radius = config('halo.theme.default_radius', 'md');
        return config("halo.theme.radius.{$radius}", 'rounded-md');
    }
}
