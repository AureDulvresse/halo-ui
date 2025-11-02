<?php
return [
    'layout' => 'app',
    'title' => 'HaloUI v3 Demo',
    'sections' => [
        [
            'title' => 'Gradients & Glow',
            'description' => 'Démonstration des nouveaux effets visuels',
            'code' => <<<'BLADE'
                <div class="space-y-4">
                    <x-halo-button gradient variant="primary" class="w-full">
                        Bouton avec Gradient Primary
                    </x-halo-button>

                    <x-halo-button gradient variant="success" class="w-full">
                        Bouton avec Gradient Success
                    </x-halo-button>

                    <x-halo-button glow variant="primary" class="w-full">
                        Bouton avec Glow Effect
                    </x-halo-button>
                </div>
            BLADE
        ],
        [
            'title' => 'Glassmorphisme',
            'description' => 'Cartes avec effet verre',
            'code' => <<<'BLADE'
                <div class="grid grid-cols-2 gap-4 bg-gradient-to-r from-blue-500 to-purple-500 p-8 rounded-lg">
                    <x-halo-card glass>
                        <x-halo-card-body>
                            <h3 class="text-lg font-medium">Carte Verre Claire</h3>
                            <p class="mt-2">Contenu avec effet de transparence</p>
                        </x-halo-card-body>
                    </x-halo-card>

                    <x-halo-card glass dark>
                        <x-halo-card-body>
                            <h3 class="text-lg font-medium text-white">Carte Verre Sombre</h3>
                            <p class="mt-2 text-gray-200">Variante sombre du glassmorphisme</p>
                        </x-halo-card-body>
                    </x-halo-card>
                </div>
            BLADE
        ],
        [
            'title' => 'Animations',
            'description' => 'Exemples des nouvelles animations',
            'code' => <<<'BLADE'
                <div class="space-y-4">
                    <x-halo-button @click="$dispatch('show-modal', 'demo-modal')" class="animate-bounce">
                        Ouvrir Modal
                    </x-halo-button>

                    <x-halo-modal name="demo-modal" animate="fade">
                        <x-halo-modal-header>
                            Modal avec Animation
                        </x-halo-modal-header>
                        <x-halo-modal-body>
                            Cette modal utilise l'animation de fade.
                        </x-halo-modal-body>
                    </x-halo-modal>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="animate-fade-in">Fade In</div>
                        <div class="animate-slide-up">Slide Up</div>
                        <div class="animate-scale-in">Scale In</div>
                    </div>
                </div>
            BLADE
        ],
        [
            'title' => 'Combinaisons',
            'description' => 'Exemples de combinaisons d\'effets',
            'code' => <<<'BLADE'
                <div class="space-y-4">
                    <x-halo-button
                        variant="primary"
                        gradient
                        glow
                        class="w-full animate-pulse"
                    >
                        Tous les Effets
                    </x-halo-button>

                    <x-halo-card glass class="animate-fade-in">
                        <x-halo-card-body>
                            <h3 class="text-lg font-medium">Carte Animée</h3>
                            <p class="mt-2">Combine verre et animation</p>
                        </x-halo-card-body>
                    </x-halo-card>
                </div>
            BLADE
        ]
    ]
];
