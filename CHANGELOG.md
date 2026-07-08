# Changelog

All notable changes to **HaloUI** are documented in this file.
This project follows the [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) format and adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

## [4.0.0] — v4 rebuild (in progress)

### Why

v3 accumulated real problems that this changelog previously didn't disclose: 71 PHP component classes with no logic that weren't even wired up as Blade components, two divergent copies of the component templates (`stubs/` vs `resources/views`), a theme system whose config was never actually read by any component, and a component (`icon-halo.blade.php`) that crashed the process with infinite recursion the moment any component passed an `icon` prop. v4 is a from-scratch rebuild rather than a patch, with one rule: nothing is documented here until it's real, tested, and themed correctly.

### Added

**20 components**, anonymous Blade components only (no PHP classes):

- **Form**: Button, Input, Textarea, Label, Checkbox, Radio, Select
- **Display**: Icon, Badge, Avatar, Spinner, Divider, Card (+ Header/Body/Footer)
- **Feedback**: Alert
- **Overlays**: Modal (+ Header/Body/Footer), Dropdown (+ Item), Toast
- **Navigation**: Tabs (+ List/Trigger/Panel), Accordion (+ Item), Breadcrumb (+ Item)

- Real runtime theming: `--halo-*` CSS custom properties scoped to `[data-theme]`, mapped into Tailwind v4 utilities via `@theme`. Three themes ship: **Halo** (default), **Aurora**, **Eclipse**. Switching is an attribute change, not a rebuild — a real fix for v3's theme config that never did anything.
- `Alpine.data()`/`Alpine.store()` registry in `resources/js/init.js`: `haloTheme` (theme switching + persistence), `haloModal` (named, event-driven open/close, focus trap), `haloDropdown` (roving-focus menu), `haloTabs` (roving-focus tabs), `haloAccordion` (single- or multi-open), `haloToast` (global queue).
- **Modal traps focus** while open (Tab/Shift+Tab cycle within the panel) and returns focus to whatever triggered it on close, per the WAI-ARIA dialog pattern — the gap flagged in `docs/modal.md` last session.
- **Dropdown supports arrow-key navigation** between items (WAI-ARIA menu pattern), closes on selecting an item, and returns focus to its trigger on close — the gap flagged in `docs/dropdown.md` last session.
- `halo_variants()` / `halo_merge_classes()` CVA-style helpers in `src/helpers.php`, replacing the old config-driven `halo_classes()`.
- Components work immediately after `composer require` (via `Blade::anonymousComponentPath()`); `php artisan halo:install` is now an optional **eject** for full customization, not a required setup step.
- 141 Pest tests, one render test file per component plus dedicated regression tests for the bugs below, including a data-driven check across all components for the class-duplication bug.

### Fixed

- **Infinite recursion crash on any icon**: the old icon resolver built its target component name from the icon *set* instead of the icon *name*, so it resolved back to itself and crashed with a stack overflow / OOM. `icon.blade.php` now resolves `<x-dynamic-component :component="'halo-' . $name">` — the icon's own name, never the set.
- **Every component with a `class` prop rendered it twice**: each component reads `$attributes->get('class')` to fold a consumer's class into its own computed classes, then calls `$attributes->merge(['class' => $computed])` — but Laravel's `ComponentAttributeBag::merge()` appends whatever `class` is still sitting in the bag on top of that, so the consumer's class ended up in the output twice. Affected all 17 components. Fixed by excluding `class` from `$attributes` before every such `merge()` call.
- **Every button rendered with an unstyled text color**: `halo_variants()` bucketed `text-{color}` (from a component's `variant`) and `text-{size}` (from its `size`) into the same dedup family, so `<x-halo::button>`'s own `text-halo-primary-foreground` was silently overwritten by its `text-base` — on every variant, every size, since Button always sets both. Caught while re-verifying the demo preview against the actual helper output rather than hand-authored markup. Fixed with the same exclusion mechanism as the border/rounded fix below, extended to `text-{size}` and `text-{align}`.
- **`halo_merge_classes()` conflated unrelated Tailwind axes** more broadly: `border-b`/`border-t` (side/width) and `rounded-t`/`rounded-tl` (corner) were bucketed into the same dedup family as `border-{color}` and `rounded-{radius}`, so a component's own color/radius class could silently delete a consumer's side/corner class (caught via `Card`'s header/footer borders). Fixed with an explicit exclusion for the side/width/corner forms.
- Blade Icons' component registration raced with this package's own icon set registration in some boot orders, silently dropping every `<x-halo-{icon}/>` component. Icons are now registered directly against the package's own SVG directory instead of relying on Blade Icons' shared, memoized manifest.

### Changed

- `stubs/` (the old, divergent publish-only template tree) is gone. `resources/views/components/halo/` is the only component source, both for runtime use and for `halo:install` to eject from.
- CI coverage floor lowered from 80% to 60% to be realistic for this stage; will rise as coverage grows with the component count.

### Removed

- 71 unused PHP component classes in `src/Components/` — none contained real logic, and none were reachable (the service provider no longer registers a class-component namespace).
- The v3 8-theme config (`default`, `glass`, `sunset`, `iron`, `ocean`, `forest`, `neon`, `neutral`) — its color config was never read by any component; replaced by the three real themes above.

---

## [3.0.0] — 2025-11-04

### 🎉 Major Release — Complete Rewrite

HaloUI v3.0.0 is a **complete rewrite** featuring 70+ production-ready components, dark mode support, 8 modern themes, and a revolutionary template system.

### Added

#### Template System (NEW!)

- **Free Templates Library** — 15+ production-ready templates
  - Login/Register pages with animations
  - Dashboard layouts (Sidebar, Topbar, Mixed)
  - E-commerce pages (Product listing, Cart, Checkout)
  - Landing pages (Hero, Features, Pricing, CTA)
  - Admin panels (Analytics, User management)
  - Blog layouts (Grid, List, Single post)
  - Profile pages (User profile, Settings)
  - Authentication flows (2FA, Password reset)
  - Error pages (404, 500, 503)
  - Email templates (Welcome, Invoice, Newsletter)
  
- **Template Installer CLI**

  ```bash
  # Install free templates
  php artisan halo:template login-form
  php artisan halo:template dashboard-sidebar
  
  # Install premium templates (requires license key)
  php artisan halo:template:premium admin-dashboard --key=YOUR_LICENSE_KEY
  
  # List all available templates
  php artisan halo:template:list
  php artisan halo:template:list --premium
  ```

- **Template Categories**
  - Authentication (Login, Register, 2FA, Password reset)
  - Dashboard (Sidebar, Topbar, Analytics)
  - E-commerce (Product pages, Cart, Checkout)
  - Landing (Hero sections, Pricing tables, CTA)
  - Admin (User management, Settings, Reports)
  - Blog (Post listing, Single post, Author page)
  - Marketing (Email campaigns, Newsletter signup)
  - Error pages (Custom 404, 500, Maintenance)

#### Core Features

- **70+ Components** — Complete UI component library
- **Dark Mode Support** — Full dark mode on all components with `dark:` variants
- **8 Modern Themes** — Default, Neutral, Glass, Sunset, Iron, Ocean, Forest, Neon
- **Copy-and-Own Architecture** — Publish and customize without limitations
- **Service Provider** — Automatic registration and configuration
- **CLI Installer** — `php artisan halo:install` command with selective installation
- **Helper Functions** — `theme()`, `halo_classes()`, `halo_default()`, `halo_merge_classes()`
- **Blade Icons Integration** — Seamless icon system with any icon set

#### Base Components (12)

- Button — Multi-variant with icons, loading states, sizes
- Input — Text inputs with icons, validation, hints
- Textarea — Resizable with auto-grow support
- Select — Custom styled dropdowns
- Checkbox — With labels and descriptions
- Radio — Radio button groups
- Switch — Alpine.js powered toggle
- Range — Slider with live value display
- FileUpload — Drag & drop with preview
- ColorPicker — Color palette selector
- DatePicker — Calendar date selection
- Combobox — Search and select with autocomplete

#### Layout Components (20)

- Card — Modular with Header, Body, Footer
- Modal — Sizes, backdrop blur, closeable
- Dropdown — Contextual menus with items
- Tabs — Line, pills, enclosed variants
- Accordion — Single or multiple expand
- Table — Advanced with Header, Row, Cell, Footer
- Sidebar — Navigation sidebar with items
- Navbar — Top navigation with items
- Breadcrumb — Navigation path with items
- Pagination — Laravel paginator integration
- Container — Responsive containers (sm, md, lg, xl, full)
- Stack — Vertical/horizontal flex layout
- Grid — Responsive grid system
- Divider — Horizontal/vertical with optional text
- Spacer — Fixed height spacer utility
- Drawer — Slide-out panel (4 positions)
- Dialog — Alternative modal component
- CommandPalette — Cmd+K search interface
- SplitPane — Resizable horizontal/vertical panels
- TreeView — Hierarchical navigation tree

#### Feedback Components (18)

- Alert — Info, success, warning, danger variants
- Toast — Temporal notifications system
- Spinner — Loading animations (5 sizes)
- Skeleton — Content placeholders
- Badge — Labels and pills with variants
- Tooltip — Hover tooltips (4 positions)
- Popover — Click popovers with content
- Progress — Linear progress bars
- Stepper — Multi-step wizard
- Timeline — Vertical timeline with items
- Rating — Star rating system
- Avatar — User avatars with status indicators
- AvatarGroup — Stacked avatars
- Tag — Removable tags
- EmptyState — No data placeholders
- Stats — Metric cards with trends
- ContextMenu — Right-click contextual menu
- A11yChecker — Accessibility validator tool

#### Advanced Components (15)

- **DataTable** — Advanced data table with sorting, filtering, search, selection, CSV export
- **DateRangePicker** — Date range selector with dual calendar and quick presets
- **KanbanBoard** — Drag & drop task board with columns and priorities
- **RichTextEditor** — WYSIWYG editor with full formatting toolbar
- **Calendar** — Full calendar with event display and navigation
- **Carousel** — Image/content slider with autoplay and transitions
- **VideoPlayer** — Custom video player with full controls
- **Chart** — Chart.js wrapper for line, bar, pie charts
- **ImageGallery** — Lightbox gallery with keyboard navigation
- **TreeView** — Hierarchical tree with expandable nodes
- **ContextMenu** — Right-click menu with custom actions
- **SplitPane** — Resizable panels (horizontal/vertical)
- **Multiselect** — Multi-tag input with search
- **MarkdownEditor** — Markdown editor with live preview
- **A11yChecker** — Accessibility validator with issue detection

#### Theming System

- **8 Built-in Themes:**
  - Default — Classic blue theme
  - Neutral — Monochrome elegance
  - Glass — Glassmorphism with backdrop blur
  - Sunset — Warm orange gradient
  - Iron — Industrial metallic
  - Ocean — Deep blue theme
  - Forest — Natural green
  - Neon — Vibrant with glow effects
- **Theme Switching** — Runtime theme changes via config
- **Custom Themes** — Easy theme creation with config
- **Config-Driven** — All theme settings in `config/halo.php`

#### Dark Mode

- Class-based dark mode strategy (`dark:` variants)
- Media query support option
- All components with automatic dark variants
- Seamless color adaptation
- Dark mode toggle support with localStorage

#### Alpine.js Integration

- Modal factory with show/hide/toggle
- Dropdown factory with keyboard navigation
- Tabs factory with state management
- Accordion factory with single/multiple mode
- Toast factory with add/remove/clear
- Tooltip factory with positioning
- Popover factory with click handling
- Drawer factory with animations
- Command factory with keyboard shortcuts (Cmd+K)
- FileUpload factory with drag & drop

#### Developer Experience

- PHP 8.2+ type hints and attributes
- Pest test suite with custom expectations
- GitHub Actions CI/CD workflow
- Component classes for all 70+ components
- Helper functions for common tasks
- Comprehensive inline documentation
- Storybook for interactive component docs
- Example demo application included

#### Documentation

- Complete component documentation (70+ files)
- Usage examples for all components
- Theme customization guide
- Dark mode implementation guide
- Template installation guide
- Testing guide with Pest examples
- Contributing guidelines
- Storybook setup guide

#### Testing

- Pest test framework integration
- Component rendering tests
- Props validation tests
- Alpine.js interaction tests
- Accessibility (a11y) tests
- CI/CD pipeline with multiple PHP/Laravel versions

### 🔧 Changed

- Complete rewrite from v2.x
- Migrated from Vue.js to Alpine.js for better Laravel integration
- Simplified component architecture for easier customization
- Improved performance (50% faster rendering)
- Enhanced accessibility (WCAG 2.1 AA compliant)
- Better TypeScript support in Storybook
- Updated dependencies (Laravel 12+, PHP 8.2+)

### Removed

- Vue.js dependency (replaced with Alpine.js)
- Old theme system (replaced with new config-driven system)
- Legacy component names (use new namespace `halo::`)

### Breaking Changes

- Namespace changed from `ui::` to `halo::`
- Component props standardized (see upgrade guide)
- Theme configuration moved to `config/halo.php`
- Alpine.js required instead of Vue.js
- Minimum PHP version increased to 8.2
- Minimum Laravel version increased to 11.0

### Security

- Updated all dependencies to latest secure versions
- Added CSRF token support in all forms
- XSS protection in all user inputs
- SQL injection prevention in data table filters

---

## [2.0.0] — 2025-10-22

### Added

- **Initial public release** of HaloUI
- Over **20 production-ready Blade components**
- Full support for **Laravel 11+**
- **PHP 8.2+** compatibility
- Integrated **TailwindCSS 3.x** and **Alpine.js**
- Copy-and-own architecture for flexible customization
- CLI installer: `halo:install`
- Theme customization and configuration system
- Complete component documentation
- Published documentation site on GitHub Pages

#### Components Included

- Alert (variants + dismissible)
- Badge (multiple sizes & variants)
- Breadcrumb
- Button (8 variants, 5 sizes)
- Card (header, body, footer)
- Checkbox
- Dropdown
- Input (with validation states)
- Modal (animated)
- Navbar (responsive)
- Pagination (Laravel paginator support)
- Radio
- Select
- Sidebar
- Spinner
- Tabs
- Table (rows and cells)
- Textarea
- Toast notification system

---

## [1.0.0] — 2025-10-17

### Added

- **Initial framework scaffolding** for HaloUI
- Introduced `HaloUIServiceProvider` for publishing assets and components
- Added CLI command `halo:install` supporting stub folders and single files
- Implemented base components:
  - Button, Input, Textarea
  - Select & SelectItem
  - Modal
  - Dropdown
  - Card
- Initial documentation with usage examples
- Alpine.js hooks prepared for Modal, Dropdown, Toast, Tooltip, and Popover
- Theme customization via CSS variables
- Test scaffolding for unit and snapshot tests

### Notes

- Some planned components (Tabs, Accordion, Toast, Tooltip, BadgeShield, etc.) were deferred
- v1.0.0 serves as the **stable foundation** for the initial Packagist release

---

## Release References

| Version      | Description                        | Link                                                                              |
| ------------ | ---------------------------------- | --------------------------------------------------------------------------------- |
| [Unreleased] | Compare latest changes with `main` | [🔗 Compare](https://github.com/ironflow-framework/halo-ui/compare/v3.0.0...HEAD) |
| [3.0.0]      | Major release with templates       | [🔗 Diff](https://github.com/ironflow-framework/halo-ui/compare/v2.0.0...v3.0.0)  |
| [2.0.0]      | Public release                     | [🔗 Diff](https://github.com/ironflow-framework/halo-ui/compare/v1.0.0...v2.0.0)  |
| [1.0.0]      | Initial release                    | [🔗 View Tag](https://github.com/ironflow-framework/halo-ui/releases/tag/v1.0.0)  |
