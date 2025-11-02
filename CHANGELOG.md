# Changelog

All notable changes to **HaloUI** are documented in this file.
This project follows the [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) format and adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

---

## [3.0.0] — 2025-11-02

### Added

#### New Components

* **TimePicker** — Time selector supporting 12- and 24-hour formats.
* **Timeline** & **TimelineItem** — Advanced chronological event visualization.
* **Toggle** — Customizable on/off switch component.
* **TreeView** — Hierarchical navigation structure with nested items.

#### 🧩 Expanded Component Library (21 New Components)

* **Avatar** & **AvatarGroup** — Image and initials fallback system.
* **Progress** — Patterned and animated progress bars.
* **Accordion** — Collapsible panels with multi-expand option.
* **Divider** — Labelled separators with visual variants.
* **Skeleton** — Flexible loading placeholders.
* **EmptyState** — Elegant empty-content presentation.
* **Rating** — Interactive star rating system.
* **Timeline** — Chronological event tracking.
* **Calendar** & **DatePicker** — Advanced date selection.
* **ColorPicker** — Palette-based color selection.
* **ImageCropper** — Integrated image cropping tool.
* **RichText** — WYSIWYG text editor.
* **SliderRange** — Range selection slider.
* **Stats** — Data summary blocks.
* **Chip** — Interactive tags and labels.
* **BottomSheet** — Mobile-style sliding panel.
* **CommandPalette** — Spotlight-like quick action search.
* **ContextMenu** — Fully customizable right-click menu.
* **TreeView** — Hierarchical item navigation.
* **Kbd** — Keyboard shortcut display.
* **Code** — Syntax-highlighted code blocks.

#### Visual Enhancements

* **New props** `glass` and `animate` across all core components.
* **Glass/glow visual system** available globally.
* Unified animation system with per-component configuration.
* Enhanced support for **glassmorphism** and **fluid transitions** on:

  * **Toast** — Glass effects and motion presets.
  * **Badge** — Adaptive glass or flat variants.
  * **Chip** — Animated entry/exit effects.
  * **Avatar** — Glass and transition modes.

---

### Changed

* Refactored Blade stubs to use `halo_classes` consistently.
* Optimized Tailwind class structure for readability and maintainability.
* Migrated to unified glassmorphism utilities.
* Improved dark mode handling with conditional classes.

---

### Improvements

#### Theme & Design

* Added new CSS variables for advanced customization.
* Enhanced and persistent dark mode.
* Unified glassmorphism style system.
* Optimized animations and transitions.
* Introduced new responsive grid utilities.

#### Developer Experience (DX)

* Reworked `InstallCommand` with a guided installation workflow.
* Added helper `halo_merge_classes` for class name merging.
* TypeScript support with auto-generated type definitions.
* Extended unit test coverage (now >90%).
* Interactive documentation with real-time examples.

#### Architecture

* Full theme system refactor using CSS variables.
* New JavaScript APIs for reactive state management.
* Added Blade named slot support.
* Improved performance and reduced dependency overhead.
* Enhanced Alpine.js state integration.

---

### Breaking Changes

* Overhauled theme configuration structure.
* Migration to CSS variable-based customization.
* API changes for several core components.
* Removal of legacy compatibility classes and utilities.

---

## [2.0.0] — 2025-10-22

### Added

* **Initial public release** of HaloUI.
* Over **20 production-ready Blade components**.
* Full support for **Laravel 11+** and **12+**.
* **PHP 8.2+** compatibility.
* Integrated **TailwindCSS 3.x** and **Alpine.js**.
* Copy-and-own architecture for flexible customization.
* CLI installer: `halo:install`.
* Theme customization and configuration system.
* Complete component documentation.
* Published documentation site on GitHub Pages.

#### Components Included

* Alert (variants + dismissible)
* Badge (multiple sizes & variants)
* Breadcrumb
* Button (8 variants, 5 sizes)
* Card (header, body, footer)
* Checkbox
* Dropdown
* Input (with validation states)
* Modal (animated)
* Navbar (responsive)
* Pagination (Laravel paginator support)
* Radio
* Select
* Sidebar
* Spinner
* Tabs
* Table (rows and cells)
* Textarea
* Toast notification system

---

## [1.0.0] — 2025-10-17

### Added

* **Initial framework scaffolding** for HaloUI.
* Introduced `HaloUIServiceProvider` for publishing assets and components.
* Added CLI command `halo:install` supporting stub folders and single files.
* Implemented base components:

  * Button, Input, Textarea
  * Select & SelectItem
  * Modal
  * Dropdown
  * Card
* Initial documentation with usage examples.
* Alpine.js hooks prepared for Modal, Dropdown, Toast, Tooltip, and Popover.
* Theme customization via CSS variables.
* Test scaffolding for unit and snapshot tests.

### Notes

* Some planned components (Tabs, Accordion, Toast, Tooltip, BadgeShield, etc.) were deferred.
* v1.0.0 serves as the **stable foundation** for the initial Packagist release.

---

## Release References

| Version      | Description                        | Link                                                                              |
| ------------ | ---------------------------------- | --------------------------------------------------------------------------------- |
| [Unreleased] | Compare latest changes with `main` | [🔗 Compare](https://github.com/ironflow-framework/halo-ui/compare/v3.0.0...HEAD) |
| [3.0.0]      | Release 3.0.0                      | [🔗 View Tag](https://github.com/ironflow-framework/halo-ui/releases/tag/v3.0.0)  |
| [2.0.0]      | Release 2.0.0                      | [🔗 Diff](https://github.com/ironflow-framework/halo-ui/compare/v1.0.0...v2.0.0)  |
| [1.0.0]      | Initial release                    | [🔗 View Tag](https://github.com/ironflow-framework/halo-ui/releases/tag/v1.0.0)  |

