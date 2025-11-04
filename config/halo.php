<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Active Theme
    |--------------------------------------------------------------------------
    |
    | Choose your active theme: 'default', 'neutral', 'glass', 'sunset',
    | 'iron', 'ocean', 'forest', 'neon'
    |
    */

    'active_theme' => env('HALO_THEME', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Dark Mode
    |--------------------------------------------------------------------------
    |
    | Enable dark mode support. When enabled, all components will include
    | dark mode variants using Tailwind's dark: modifier.
    |
    */

    'dark_mode' => [
        'enabled' => true,
        'strategy' => 'class', // 'class' or 'media'
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    |
    | Define multiple themes with their color palettes and styles.
    |
    */

    'themes' => [
        'default' => [
            'colors' => [
                'primary' => 'blue',
                'secondary' => 'slate',
                'success' => 'green',
                'danger' => 'red',
                'warning' => 'amber',
                'info' => 'sky',
            ],
        ],

        'neutral' => [
            'colors' => [
                'primary' => 'slate',
                'secondary' => 'zinc',
                'success' => 'emerald',
                'danger' => 'rose',
                'warning' => 'orange',
                'info' => 'gray',
            ],
        ],

        'glass' => [
            'colors' => [
                'primary' => 'cyan',
                'secondary' => 'slate',
                'success' => 'teal',
                'danger' => 'pink',
                'warning' => 'amber',
                'info' => 'blue',
            ],
            'effects' => [
                'backdrop_blur' => 'backdrop-blur-xl',
                'transparency' => 'bg-opacity-60 dark:bg-opacity-40',
            ],
        ],

        'sunset' => [
            'colors' => [
                'primary' => 'orange',
                'secondary' => 'amber',
                'success' => 'lime',
                'danger' => 'red',
                'warning' => 'yellow',
                'info' => 'orange',
            ],
        ],

        'iron' => [
            'colors' => [
                'primary' => 'gray',
                'secondary' => 'neutral',
                'success' => 'green',
                'danger' => 'red',
                'warning' => 'yellow',
                'info' => 'slate',
            ],
        ],

        'ocean' => [
            'colors' => [
                'primary' => 'blue',
                'secondary' => 'cyan',
                'success' => 'teal',
                'danger' => 'rose',
                'warning' => 'amber',
                'info' => 'sky',
            ],
        ],

        'forest' => [
            'colors' => [
                'primary' => 'green',
                'secondary' => 'emerald',
                'success' => 'lime',
                'danger' => 'red',
                'warning' => 'amber',
                'info' => 'teal',
            ],
        ],

        'neon' => [
            'colors' => [
                'primary' => 'purple',
                'secondary' => 'pink',
                'success' => 'green',
                'danger' => 'red',
                'warning' => 'yellow',
                'info' => 'cyan',
            ],
            'effects' => [
                'glow' => 'shadow-[0_0_15px_rgba(168,85,247,0.4)] dark:shadow-[0_0_20px_rgba(168,85,247,0.6)]',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Global theme tokens accessible via theme() helper.
    |
    */

    'theme' => [
        'radius' => [
            'none' => 'rounded-none',
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'xl' => 'rounded-xl',
            '2xl' => 'rounded-2xl',
            'full' => 'rounded-full',
        ],

        'spacing' => [
            'xs' => '0.5rem',
            'sm' => '0.75rem',
            'md' => '1rem',
            'lg' => '1.5rem',
            'xl' => '2rem',
            '2xl' => '2.5rem',
        ],

        'typography' => [
            'font-family' => 'font-sans',
            'sizes' => [
                'xs' => 'text-xs',
                'sm' => 'text-sm',
                'md' => 'text-base',
                'lg' => 'text-lg',
                'xl' => 'text-xl',
                '2xl' => 'text-2xl',
            ],
        ],

        'shadows' => [
            'sm' => 'shadow-sm',
            'md' => 'shadow-md',
            'lg' => 'shadow-lg',
            'xl' => 'shadow-xl',
            '2xl' => 'shadow-2xl',
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

        'modal' => [
            'size' => 'md',
            'backdrop' => 'blur',
        ],

        'alert' => [
            'variant' => 'info',
            'dismissible' => true,
        ],

        'card' => [
            'variant' => 'default',
            'padding' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    */

    'icons' => [
        'set' => 'halo',
        'fallback_set' => 'heroicon',
        'default_class' => 'w-5 h-5',
        'path' => resource_path('icons/halo'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Alpine.js Configuration
    |--------------------------------------------------------------------------
    */

    'alpine' => [
        'enabled' => true,
        'cdn' => 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Variants (with Dark Mode Support)
    |--------------------------------------------------------------------------
    */

    'variants' => [
        'button' => [
            'primary' => 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white border-transparent',
            'secondary' => 'bg-slate-200 hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-900 dark:text-slate-100 border-transparent',
            'outline' => 'bg-transparent hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-900 dark:text-slate-100 border-slate-300 dark:border-slate-600',
            'ghost' => 'bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-900 dark:text-slate-100 border-transparent',
            'danger' => 'bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white border-transparent',
            'success' => 'bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white border-transparent',
            'glass' => 'bg-white/10 dark:bg-white/5 backdrop-blur-xl border border-white/20 dark:border-white/10 text-slate-900 dark:text-white hover:bg-white/20 dark:hover:bg-white/10',
        ],

        'alert' => [
            'info' => 'bg-sky-50 dark:bg-sky-950/30 text-sky-900 dark:text-sky-200 border-sky-200 dark:border-sky-800',
            'success' => 'bg-green-50 dark:bg-green-950/30 text-green-900 dark:text-green-200 border-green-200 dark:border-green-800',
            'warning' => 'bg-amber-50 dark:bg-amber-950/30 text-amber-900 dark:text-amber-200 border-amber-200 dark:border-amber-800',
            'danger' => 'bg-red-50 dark:bg-red-950/30 text-red-900 dark:text-red-200 border-red-200 dark:border-red-800',
        ],

        'badge' => [
            'primary' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 border-blue-200 dark:border-blue-800',
            'secondary' => 'bg-slate-100 dark:bg-slate-800/50 text-slate-800 dark:text-slate-300 border-slate-200 dark:border-slate-700',
            'success' => 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 border-green-200 dark:border-green-800',
            'danger' => 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 border-red-200 dark:border-red-800',
            'glass' => 'bg-white/10 dark:bg-white/5 backdrop-blur-md text-slate-900 dark:text-white border-white/20 dark:border-white/10',
        ],

        'card' => [
            'default' => 'bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 shadow-sm',
            'bordered' => 'bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700',
            'elevated' => 'bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 shadow-lg',
            'flat' => 'bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 shadow-none',
            'glass' => 'bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl border-white/20 dark:border-white/10 shadow-xl',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Sizes
    |--------------------------------------------------------------------------
    */

    'sizes' => [
        'button' => [
            'xs' => 'px-2 py-1 text-xs',
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-6 py-3 text-lg',
            'xl' => 'px-8 py-4 text-xl',
        ],

        'input' => [
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-3 text-lg',
        ],

        'modal' => [
            'sm' => 'max-w-md',
            'md' => 'max-w-lg',
            'lg' => 'max-w-2xl',
            'xl' => 'max-w-4xl',
            '2xl' => 'max-w-6xl',
            'full' => 'max-w-full',
        ],

        'avatar' => [
            'xs' => 'w-6 h-6 text-xs',
            'sm' => 'w-8 h-8 text-sm',
            'md' => 'w-10 h-10 text-base',
            'lg' => 'w-12 h-12 text-lg',
            'xl' => 'w-16 h-16 text-xl',
            '2xl' => 'w-20 h-20 text-2xl',
        ],
    ],
];
