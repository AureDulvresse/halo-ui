# Changelog

All notable changes to HaloUI will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Ajouté

- Support des effets visuels glass/glow sur tous les composants via props
- Système d'animation unifié avec configurations par composant
- Props `glass` et `animate` ajoutés aux composants :
  - Toast - Effets de glassmorphisme et transitions fluides
  - Badge - Styles adaptables avec/sans effet verre
  - Chip - Animation et effets visuels
  - Avatar - Support du mode glass et transitions

### Modifié

- Refactoring des stubs pour utiliser `halo_classes` uniformément
- Optimisation des classes Tailwind pour la clarté du code
- Migration vers les nouvelles classes de glassmorphisme
- Amélioration du support du mode sombre avec classes conditionnelles

## [3.0.0] - 2025-11-01

### Added

- **21 Nouveaux Composants**:
  - Avatar & AvatarGroup - Support d'images et fallback initiales
  - Progress - Barres de progression avec motifs et animations
  - Accordion - Sections pliables avec support multi-ouverture
  - Divider - Séparateurs avec étiquettes et variantes
  - Skeleton - États de chargement avec presets
  - Empty State - Affichage des états vides
  - Rating - Notation par étoiles interactive
  - Timeline - Affichage chronologique d'événements
  - Calendar & DatePicker - Sélection de dates avancée
  - ColorPicker - Sélection de couleurs avec palette
  - ImageCropper - Recadrage d'images intégré
  - RichText - Éditeur WYSIWYG
  - SliderRange - Sélection de plages de valeurs
  - Stats - Affichage de statistiques
  - Chip - Tags interactifs
  - BottomSheet - Panneau coulissant mobile
  - CommandPalette - Recherche rapide type Spotlight
  - ContextMenu - Menu contextuel personnalisable
  - TreeView - Navigation arborescente
  - Kbd - Affichage de raccourcis clavier
  - Code - Mise en forme de code avec highlight

### Améliorations

- **Thème & Design**:

  - Nouvelles variables CSS pour personnalisation avancée
  - Support du mode sombre amélioré avec persistance
  - Effets de glassmorphisme pour interfaces modernes
  - Animations optimisées et transitions fluides
  - Nouveau système de grilles pour layouts responsifs

- **DX (Developer Experience)**:

  - InstallCommand revu avec workflow guidé
  - Nouveau helper 'halo_merge_classes' pour fusion de classes
  - Support TypeScript avec types générés
  - Tests unitaires étendus (couverture >90%)
  - Documentation interactive

- **Architecture**:
  - Refonte du système de thèmes avec CSS variables
  - Nouvelles API JavaScript pour gestion d'état
  - Support des slots nommés Blade
  - Optimisation des performances
  - Meilleure gestion des dépendances Alpine.js

### Breaking Changes

- Nouvelle structure de configuration des thèmes
- Migration vers les CSS variables pour customisation
- Changements d'API sur certains composants
- Suppression des anciennes classes de compatibilité

## [2.0.0] - 2025-10-22

### Added

- Initial release of HaloUI
- 20+ production-ready components
- Full Laravel 11+ and 12+ support
- PHP 8.2+ support
- TailwindCSS 3.0+ integration
- Alpine.js powered interactions
- Copy-and-own component architecture
- CLI installer command `halo:install`
- Comprehensive configuration system
- Theme customization support
- Component documentation for all components
- GitHub Pages documentation site

#### Components

- Alert component with variants and dismissible state
- Badge component with multiple variants and sizes
- Breadcrumb navigation component
- Button component with 8 variants and 5 sizes
- Card component with header, body, and footer
- Checkbox input component
- Dropdown menu component
- Input component with validation states
- Modal dialog component with animations
- Navbar component with mobile menu
- Pagination component for Laravel paginators
- Radio button component
- Select dropdown component
- Sidebar navigation component
- Spinner loading indicator
- Tab navigation component
- Table component with rows and cells
- Textarea component
- Toast notification system

## [1.0.0] - 2025-10-17

### Added

- Initial v1.0.0 scaffolding for HaloUI
- Service provider HaloUIServiceProvider for publishing components and assets
- CLI command halo:install supporting both stub folders and single stub files
- Base components implemented:
  - Button, Input, Textarea
  - Select + SelectItem
  - Modal
  - Dropdown
  - Card
- README v1.0.0 with installation instructions, usage examples, and component list
- Alpine.js hooks prepared for interactive components: Modal, Dropdown, Toast, Tooltip, Popover
- Theme customization via CSS variables
- Testing structure prepared for unit and snapshot tests

### Notes

- Not all planned components are included yet (Tabs, Accordion, Toast, Tooltip, Popover, BadgeShield, etc.)
- Future updates will add remaining components and advanced features
- v1.0.0 considered stable base for initial Packagist release

## Releases

[Unreleased]: https://github.com/ironflow-framework/ironflow/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/ironflow-framework/ironflow/releases/tag/v1.0.0
