<?php

return [
    /*
    |--------------------------------------------------------------------------
    | HaloUI Theme Configuration  
    |--------------------------------------------------------------------------
    |
    | Customize the default theme settings for HaloUI components.
    | These values can be overridden per component.
    |
    */

    'theme' => [
        'colors' => [
            'primary' => 'blue-600',
            'secondary' => 'gray-600', 
            'success' => 'green-600',
            'danger' => 'red-600',
            'warning' => 'yellow-500',
            'info' => 'cyan-600',
            'light' => 'gray-100',
            'dark' => 'gray-900',

            // Gradients
            'gradients' => [
                'primary' => 'from-blue-600 to-indigo-600',
                'success' => 'from-green-500 to-emerald-600',
                'danger' => 'from-red-500 to-rose-600',
                'warning' => 'from-amber-400 to-orange-500',
            ],

            // Glass effects
            'glass' => [
                'light' => 'bg-white/80 backdrop-blur-sm',
                'dark' => 'bg-gray-900/80 backdrop-blur-sm',
            ]
        ],

        'spacing' => [
            'xs' => '0.5rem',
            'sm' => '1rem',
            'md' => '1.5rem', 
            'lg' => '2rem',
            'xl' => '2.5rem',
            '2xl' => '3rem',
        ],

        'typography' => [
            'font-family' => [
                'sans' => 'Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif',
                'serif' => 'ui-serif, Georgia, Cambria, "Times New Roman", Times, serif',
                'mono' => 'ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace',
            ],
            'sizes' => [
                'xs' => '0.75rem',
                'sm' => '0.875rem',
                'base' => '1rem',
                'lg' => '1.125rem', 
                'xl' => '1.25rem',
                '2xl' => '1.5rem',
                '3xl' => '1.875rem',
            ],
            'line-height' => [
                'tight' => '1.25',
                'snug' => '1.375',
                'normal' => '1.5',
                'relaxed' => '1.625',
                'loose' => '2',
            ]
        ],

        'border_radius' => [
            'none' => '0',
            'sm' => '0.25rem',
            'md' => '0.375rem',
            'lg' => '0.5rem',
            'xl' => '0.75rem',
            'full' => '9999px',
        ],

        'shadows' => [
            'sm' => '0 1px 2px 0 rgb(0 0 0 / 0.05)',
            'md' => '0 4px 6px -1px rgb(0 0 0 / 0.1)',
            'lg' => '0 10px 15px -3px rgb(0 0 0 / 0.1)',
            'xl' => '0 20px 25px -5px rgb(0 0 0 / 0.1)',
            'glow' => [
                'primary' => '0 0 15px rgb(37 99 235 / 0.5)',
                'success' => '0 0 15px rgb(34 197 94 / 0.5)',
                'danger' => '0 0 15px rgb(239 68 68 / 0.5)',
                'warning' => '0 0 15px rgb(245 158 11 / 0.5)',
            ]
        ],

        'animations' => [
            'duration' => [
                'fast' => '150ms',
                'normal' => '300ms',
                'slow' => '500ms',
            ],
            'timing' => [
                'ease-in-out' => 'cubic-bezier(0.4, 0, 0.2, 1)',
                'ease-out' => 'cubic-bezier(0, 0, 0.2, 1)',
                'ease-in' => 'cubic-bezier(0.4, 0, 1, 1)',
            ],
        ],

        'z-index' => [
            'dropdown' => '10',
            'sticky' => '20',
            'fixed' => '30',
            'modal' => '40',
            'popover' => '50',
            'toast' => '60',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the default icon set and classes for HaloUI icons.
    |
    */

    'icons' => [
        'set' => 'halo',
        'default_class' => 'w-5 h-5',
        'fallback_set' => 'heroicon',
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Defaults
    |--------------------------------------------------------------------------
    |
    | Default variant and size for each component type.
    |
    */

    'defaults' => [
        'button' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
        'input' => [
            'variant' => 'default',
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
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Variants
    |--------------------------------------------------------------------------
    |
    | Define Tailwind classes for each component variant.
    |
    */

    'variants' => [
        'button' => [
            'primary' => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
            'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white focus:ring-gray-500',
            'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500',
            'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500',
            'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white focus:ring-yellow-500',
            'info' => 'bg-cyan-600 hover:bg-cyan-700 text-white focus:ring-cyan-500',
            'outline' => 'border border-gray-300 hover:bg-gray-50 text-gray-700 focus:ring-gray-500',
            'ghost' => 'hover:bg-gray-100 text-gray-700 focus:ring-gray-500',
            'link' => 'text-blue-600 hover:text-blue-700 underline-offset-4 hover:underline',
        ],

        'badge' => [
            'primary' => 'bg-blue-100 text-blue-800 border-blue-200',
            'secondary' => 'bg-gray-100 text-gray-800 border-gray-200',
            'success' => 'bg-green-100 text-green-800 border-green-200',
            'danger' => 'bg-red-100 text-red-800 border-red-200',
            'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'info' => 'bg-cyan-100 text-cyan-800 border-cyan-200',
        ],

        'alert' => [
            'info' => 'bg-cyan-50 border-cyan-200 text-cyan-900',
            'success' => 'bg-green-50 border-green-200 text-green-900',
            'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-900',
            'danger' => 'bg-red-50 border-red-200 text-red-900',
        ],

        'input' => [
            'default' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500',
            'error' => 'border-red-300 focus:border-red-500 focus:ring-red-500',
            'success' => 'border-green-300 focus:border-green-500 focus:ring-green-500',
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Sizes
    |--------------------------------------------------------------------------
    |
    | Define size classes for components.
    |
    */

    'sizes' => [
        'button' => [
            'xs' => 'px-2 py-1 text-xs',
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-2.5 text-lg',
            'xl' => 'px-6 py-3 text-xl',
        ],

        'input' => [
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-2.5 text-lg',
        ],

        'badge' => [
            'sm' => 'px-2 py-0.5 text-xs',
            'md' => 'px-2.5 py-1 text-sm',
            'lg' => 'px-3 py-1.5 text-base',
        ],

        'avatar' => [
            'xs' => 'w-6 h-6',
            'sm' => 'w-8 h-8',
            'md' => 'w-10 h-10',
            'lg' => 'w-12 h-12',
            'xl' => 'w-16 h-16',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Accessibility
    |--------------------------------------------------------------------------
    |
    | Enable/disable accessibility features.
    |
    */

    'accessibility' => [
        'focus_visible' => true,
        'screen_reader_text' => true,
        'keyboard_navigation' => true,
    ],
];
