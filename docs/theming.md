# Guide de Thème HaloUI v3

## Configuration de Base

Le système de thème de HaloUI v3 utilise une combinaison de variables CSS et de classes Tailwind pour offrir une personnalisation maximale.

## Variables CSS

```css
/* Exemple de personnalisation des variables CSS */
:root {
  --halo-scroll-track: #f1f5f9;
  --halo-scroll-thumb: #cbd5e1;
  --halo-scroll-thumb-hover: #94a3b8;
}
```

## Configuration du Thème

```php
// config/halo.php
return [
    'theme' => [
        'colors' => [
            // Couleurs de base
            'primary' => 'blue-600',
            'secondary' => 'gray-600',
            // ...

            // Gradients
            'gradients' => [
                'primary' => 'from-blue-600 to-indigo-600',
                'success' => 'from-green-500 to-emerald-600',
            ],

            // Effets verre
            'glass' => [
                'light' => 'bg-white/80 backdrop-blur-sm',
                'dark' => 'bg-gray-900/80 backdrop-blur-sm',
            ]
        ],

        // Ombres avec effets glow
        'shadows' => [
            'glow' => [
                'primary' => '0 0 15px rgb(37 99 235 / 0.5)',
                'success' => '0 0 15px rgb(34 197 94 / 0.5)',
            ]
        ],

        // Animations
        'animations' => [
            'duration' => [
                'fast' => '150ms',
                'normal' => '300ms',
                'slow' => '500ms',
            ],
            'timing' => [
                'ease-in-out' => 'cubic-bezier(0.4, 0, 0.2, 1)',
            ]
        ],
    ]
];
```

## Utilisation

### Gradients

```blade
<x-halo-button gradient variant="primary">
    Bouton avec Gradient
</x-halo-button>
```

### Glassmorphisme

```blade
<x-halo-card glass>
    Carte avec effet verre
</x-halo-card>
```

### Effets Glow

```blade
<x-halo-button glow variant="primary">
    Bouton avec effet glow
</x-halo-button>
```

### Animations

```blade
<x-halo-modal animate="fade">
    Modal avec animation de fade
</x-halo-modal>
```

### Combinaison d'Effets

```blade
<x-halo-button
    variant="primary"
    gradient
    glow
    class="animate-bounce"
>
    Bouton avec multiples effets
</x-halo-button>
```

## Personnalisation Avancée

### Extension des Thèmes

```php
// Dans votre fichier de configuration
'theme' => [
    'colors' => [
        'custom' => [
            'brand' => '#FF5733',
            'accent' => '#33FF57',
        ]
    ],
    'gradients' => [
        'custom' => 'from-[#FF5733] to-[#33FF57]'
    ]
]
```

### Mode Sombre

Le mode sombre est automatiquement détecté et peut être contrôlé via JavaScript :

```js
// Basculer le mode sombre
HaloUI.theme.toggle();

// Définir un mode spécifique
HaloUI.theme.set("dark");
```

### Classes Utilitaires

- `.halo-glass` : Appliquer l'effet verre
- `.halo-gradient-primary` : Appliquer un gradient prédéfini
- `.animate-fade-in` : Animation de fondu
- `.animate-slide-up` : Animation de glissement vers le haut
- `.animate-scale-in` : Animation d'échelle
