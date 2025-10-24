# Changelog

All notable changes to HaloUI will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Nothing yet

### Changed

- Nothing yet

## [2.1.0] - 2025-10-24

### Added

- **Switch** component for boolean toggle inputs
- **Avatar** component with automatic fallback to initials
- **Progress** component with striped and animated variants
- **Accordion** component with collapsible sections
- **Divider** component with label support
- **Skeleton** component for loading states
- **Empty State** component for no-data displays
- **Rating** component for star ratings
- **Timeline** component for chronological events
- Enhanced documentation for all new components
- 9 new component examples

### Features

- Switch component with 3 sizes and Alpine.js integration
- Avatar component with circle/square shapes and 6 sizes
- Progress bars with striped patterns and animations
- Accordion with single/multiple open support
- Divider with 4 style variants (solid, dashed, dotted, thick)
- Skeleton with 5 preset variants
- Empty state with customizable icons and actions
- Interactive star rating with hover states
- Timeline with icon and variant support

### Improved
- InstallCommand updated to support 9 new components
- Documentation structure enhanced
- Component count increased from 20 to 29

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
