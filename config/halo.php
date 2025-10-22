<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Customize the default theme settings for HaloUI components.
    | These values can be overridden on a per-component basis.
    |
    */

    'theme' => [
        /*
        |--------------------------------------------------------------------------
        | Colors
        |--------------------------------------------------------------------------
        */
        'colors' => [
            'primary' => 'blue',
            'secondary' => 'gray',
            'success' => 'green',
            'danger' => 'red',
            'warning' => 'yellow',
            'info' => 'cyan',
        ],

        /*
        |--------------------------------------------------------------------------
        | Border Radius
        |--------------------------------------------------------------------------
        */
        'radius' => [
            'none' => 'rounded-none',
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'xl' => 'rounded-xl',
            'full' => 'rounded-full',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Radius
        |--------------------------------------------------------------------------
        */
        'default_radius' => 'md',

        /*
        |--------------------------------------------------------------------------
        | Spacing
        |--------------------------------------------------------------------------
        */
        'spacing' => [
            'xs' => '0.5rem',
            'sm' => '0.75rem',
            'md' => '1rem',
            'lg' => '1.5rem',
            'xl' => '2rem',
        ],

        /*
        |--------------------------------------------------------------------------
        | Typography
        |--------------------------------------------------------------------------
        */
        'typography' => [
            'font_family' => 'font-sans',
            'sizes' => [
                'xs' => 'text-xs',
                'sm' => 'text-sm',
                'md' => 'text-base',
                'lg' => 'text-lg',
                'xl' => 'text-xl',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'button' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
        'input' => [
            'size' => 'md',
        ],
        'badge' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
        'alert' => [
            'variant' => 'info',
            'dismissible' => false,
        ],
        'modal' => [
            'size' => 'md',
            'backdrop' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Toast Configuration
    |--------------------------------------------------------------------------
    */

    'toast' => [
        'duration' => 3000, // milliseconds
        'position' => 'top-right', // top-right, top-left, bottom-right, bottom-left, top-center, bottom-center
        'max_toasts' => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Icons
    |--------------------------------------------------------------------------
    |
    | Configure icon integration. HaloUI supports blade-icons out of the box.
    |
    */

    'icons' => [
        'enabled' => true,
        'default_set' => 'heroicon-o', // Uses Heroicons Outline by default
    ],
];
