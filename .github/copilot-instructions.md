## Objectif rapide

Ces instructions aident un agent IA à contribuer rapidement au dépôt `halo-ui` : un package Laravel de composants Blade + Tailwind + Alpine.

## Vue d'ensemble du projet

- Type: package PHP / Laravel (PSR-4 namespace `Halo\\UI\\` → `src/`).
- UI côté serveur: composants Blade class-based sous `src/Components/` et vues-stubs sous `stubs/components`.
- JS/CSS: `resources/js/halo.js`, `resources/css/halo.css` (assets publiés dans `public/vendor/halo-ui` via publish tags).
- Configuration: `config/halo.php` — source des thèmes, variantes et valeurs par défaut.

Fichiers clés à lire :

- `src/Providers/HaloServiceProvider.php` (enregistrement des composants, alias, publishes, directives)
- `composer.json` (tests via Pest, autoload, provider auto-discovery)
- `README.md` (exemples d'usage, API JS, commandes d'installation)
- `stubs/components/` (templates Blade par défaut à publier/modifier)
- `resources/js/halo.js` (API JS exposée : `HaloUI.modal`, `HaloUI.toast`, `HaloUI.theme`)

## Comportement important & conventions

- Provider: `HaloServiceProvider` appelle `Blade::componentNamespace('Halo\\UI\\Components', 'halo')` et crée des alias courts (`<x-halo-btn />` → classe `Button`). Utiliser ces alias quand on écrit des tests/README.
- Publishes: config (`halo-config`), components/stubs (`halo-components`), assets (`halo-assets`), templates (`halo-templates`). Tests et scripts CI doivent publier assets if necessary.
- Directives Blade: `@haloIcon('name')` et `@haloTheme(...)` — les templates package utilisent ces directives, donc préférer leur usage quand on modifie icônes/thèmes.
- Tests: Pest + Orchestra Testbench. Les tests se trouvent dans `tests/` et s'exécutent via `composer test`.

## Commandes fréquentes (exécutables par développeurs)

- Installer dépendances PHP : `composer install`
- Lancer tests : `composer test` (script pointe vers `vendor/bin/pest`)
- Publier config/assets :
  - `php artisan vendor:publish --tag=halo-config`
  - `php artisan vendor:publish --tag=halo-assets`
  - `php artisan vendor:publish --tag=halo-components`
- Installer en local (helper) : `php artisan halo:install --all` (voir `src/Commands/InstallCommand.php`)
- JS deps : `npm install` (projet fournit `peerDependencies` pour `alpinejs`/`tailwindcss`)

## Exemples spécifiques à copier-coller

- Utilisation d'un alias de composant : `<x-halo-btn />` (alias vers `Halo\\UI\\Components\\Button`).
- Ouvrir un modal JS : `HaloUI.modal.open('user-modal')` (cf. `README.md` exemples).
- Toast depuis un contrôleur : `return redirect()->back()->with('toast', [...])` — package lit flash session pour afficher toast.

## Tests & CI

- Framework: Pest + Orchestra Testbench (composer dev deps). Les tests d'intégration montent un mini-environnement Laravel.
- Commande CI recommandée : `composer install --prefer-dist --no-interaction && composer test`.

## Règles pratiques pour l'IA

- Lire `src/Providers/HaloServiceProvider.php` avant d'ajouter/renommer un composant Blade (comprend alias et namespace).
- Quand vous modifiez l'apparence d'un composant, mettez à jour `stubs/components/` si la modification doit être publiée par l'utilisateur.
- Respecter la config `config/halo.php` : préférer utiliser config() et `@haloTheme` plutôt que valeurs codées en dur.
- Ne changez pas la signature publique des APIs JS (`HaloUI.*`) sans mettre à jour `README.md` et les tests JS/PHP associés.

## Où chercher si incertitude

- Composants et classes : `src/Components/`
- Templates par défaut : `stubs/components/`
- Assets JS/CSS : `resources/js/`, `resources/css/`
- CLI helpers : `src/Commands/InstallCommand.php`
- Tests d'exemple : `tests/Feature/Components/` (voir comment les composants sont rendus)
