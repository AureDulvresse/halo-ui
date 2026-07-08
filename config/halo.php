<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme tokens
    |--------------------------------------------------------------------------
    |
    | Radius/spacing/typography tokens accessible via the theme() helper.
    | Colors are NOT configured here — they live as CSS custom properties in
    | resources/css/theme.css (--halo-primary, --halo-danger, ...) mapped
    | into real Tailwind utility classes via Tailwind v4's @theme directive.
    | This is what makes theming/dark-mode actually work at runtime instead
    | of requiring config changes and a rebuild.
    |
    | 'default' is rendered server-side as <html data-theme="{{ ... }}"> so
    | the correct theme paints on first load, before HaloUI.theme (Alpine
    | store, see resources/js/init.js) takes over and persists the user's
    | choice in localStorage.
    |
    */

    'theme' => [
        'default' => 'halo',
        'available' => ['halo', 'aurora', 'eclipse'],
        'radius' => 'rounded-halo',
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

        'textarea' => [
            'size' => 'md',
        ],

        'select' => [
            'size' => 'md',
        ],

        'badge' => [
            'variant' => 'secondary',
        ],

        'card' => [
            'variant' => 'default',
        ],

        'alert' => [
            'variant' => 'info',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    */

    'icons' => [
        'set' => 'halo',
        'default_class' => 'w-5 h-5',
    ],
];
