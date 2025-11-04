# HaloUI

<p align="start">
  <a href="https://packagist.org/packages/ironflow/ironflow">
    <img src="https://img.shields.io/packagist/v/ironflow/halo-ui" alt="Latest Version" />
  </a>
  <a href="https://packagist.org/packages/ironflow/halo-ui">
    <img src="https://img.shields.io/packagist/dt/ironflow/halo-ui" alt="Total Downloads" />
  </a>
  <a href="https://packagist.org/packages/ironflow/halo-ui">
    <img src="https://img.shields.io/packagist/l/ironflow/halo-ui" alt="License" />
  </a>
  <a href="https://github.com/AureDulvresse/halo-ui/issues">
  <img src="https://img.shields.io/github/issues/AureDulvresse/halo-ui" alt="GitHub issues" />
  </a>
</p>

<p align="center">
  <strong>Modern, composable Blade UI component library for Laravel</strong><br>
  Elegant as shadcn/ui, native as Blade. Built with TailwindCSS, Alpine.js, and Blade Icons.
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#installation">Installation</a> •
  <a href="#components">Components</a> •
  <a href="#themes">Themes</a> •
  <a href="#documentation">Documentation</a> •
  <a href="#contributing">Contributing</a>
</p>

---

## Features

- **70+ Production-Ready Components** — From buttons to data tables
- **Dark Mode Built-in** — Full dark mode support on every component
- **8 Modern Themes** — Default, Neutral, Glass, Sunset, Iron, Ocean, Forest, Neon
- **Copy-and-Own** — Publish and customize without limitations
- **Alpine.js Powered** — Smooth interactions with minimal JavaScript
- **Blade Icons Integration** — First-class icon support
- **Fully Composable** — Mix and match components freely
- **Accessible** — ARIA attributes and keyboard navigation
- **Zero Build Step** — Works out of the box
- **Tailwind-First** — Pure utility classes, no custom CSS

---

## Installation

### Requirements

- PHP 8.2+
- Laravel 12+
- TailwindCSS 3.4+
- Alpine.js 3.x

### Install via Composer

```bash
composer require ironflow/halo-ui
```

### Install Components

```bash
# Install all components
php artisan halo:install --all

# Install specific components
php artisan halo:install button modal datatable kanban-board

# Force overwrite existing files
php artisan halo:install --all --force

# Skip assets publishing
php artisan halo:install --all --no-assets
```

### Configure Tailwind

Update your `tailwind.config.js`:

```js
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/views/components/halo/**/*.blade.php',
    './vendor/halo/ui/resources/views/**/*.blade.php',
  ],
  darkMode: 'class', // Enable dark mode
  // ... rest of config
}
```

### Include Alpine.js & HaloUI

In your layout file (`resources/views/layouts/app.blade.php`):

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- HaloUI Init -->
    <script src="{{ asset('vendor/halo-ui/js/init.js') }}"></script>
</body>
</html>
```

---

## Quick Start

### Basic Components

```blade
<!-- Button -->
<x-halo::button variant="primary" icon="check">
    Save Changes
</x-halo::button>

<!-- Input -->
<x-halo::input
    label="Email"
    type="email"
    icon="mail"
    placeholder="you@example.com"
/>

<!-- Alert -->
<x-halo::alert variant="success" dismissible>
    Profile updated successfully!
</x-halo::alert>
```

### Advanced Components

```blade
<!-- DataTable -->
<x-halo::datatable
    :columns="[
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
        ['key' => 'role', 'label' => 'Role'],
    ]"
    :data="$users"
    sortable
    searchable
    selectable
    exportable
/>

<!-- Kanban Board -->
<x-halo::kanban-board
    :columns="[
        ['id' => 'todo', 'title' => 'To Do', 'color' => '#3B82F6'],
        ['id' => 'doing', 'title' => 'In Progress', 'color' => '#F59E0B'],
        ['id' => 'done', 'title' => 'Done', 'color' => '#10B981'],
    ]"
    :tasks="$tasks"
/>

<!-- Rich Text Editor -->
<x-halo::rich-text-editor
    name="content"
    label="Post Content"
    placeholder="Start writing..."
/>
```

---

## Components

### Base Components (12)

| Component | Description | Features |
|-----------|-------------|----------|
| **Button** | Action buttons | Variants, sizes, icons, loading |
| **Input** | Text inputs | Icons, validation, hints |
| **Textarea** | Multi-line text | Resizable, auto-grow |
| **Select** | Dropdown select | Custom styling, placeholder |
| **Checkbox** | Checkboxes | Labels, descriptions |
| **Radio** | Radio buttons | Groups, validation |
| **Switch** | Toggle switches | Alpine.js powered |
| **Range** | Sliders | Live value display |
| **FileUpload** | File inputs | Drag & drop, preview |
| **ColorPicker** | Color selection | Palette, custom colors |
| **DatePicker** | Date selection | Calendar, presets |
| **Combobox** | Search & select | Autocomplete |

### Layout Components (20)

- Card (Header, Body, Footer)
- Modal (Header, Body, Footer)
- Dropdown, DropdownItem
- Tabs, TabItem
- Accordion, AccordionItem
- Table (Header, Row, Cell, Footer)
- Sidebar, SidebarItem
- Navbar, NavItem
- Breadcrumb, BreadcrumbItem
- Pagination
- Container, Stack, Grid
- Divider, Spacer
- Drawer, Dialog
- CommandPalette
- SplitPane, TreeView

### Feedback Components (18)

- Alert, Toast, Spinner, Skeleton
- Badge, Tooltip, Popover
- Progress, Stepper, Timeline, Rating
- Avatar, AvatarGroup
- Tag, EmptyState
- Stats, ContextMenu
- A11yChecker

### Advanced Components (15)

1. **DataTable** — Advanced data table with sorting, filtering, search, selection, export
2. **DateRangePicker** — Date range selector with presets
3. **KanbanBoard** — Drag & drop task board
4. **RichTextEditor** — WYSIWYG editor
5. **Calendar** — Full calendar with events
6. **Carousel** — Image/content slider
7. **VideoPlayer** — Custom video player
8. **Chart** — Chart.js wrapper
9. **ImageGallery** — Lightbox gallery
10. **TreeView** — Hierarchical tree
11. **ContextMenu** — Right-click menu
12. **SplitPane** — Resizable panels
13. **Multiselect** — Multi-tag input
14. **MarkdownEditor** — Markdown with preview
15. **A11yChecker** — Accessibility validator

---

## Themes

HaloUI comes with 8 beautiful themes:

### Built-in Themes

```php
// config/halo.php
'active_theme' => 'glass', // Change active theme
```

- **Default** — Classic blue theme
- **Neutral** — Monochrome elegance
- **Glass** — Glassmorphism with blur
- **Sunset** — Warm orange gradient
- **Iron** — Industrial metallic
- **Ocean** — Deep blue
- **Forest** — Natural green
- **Neon** — Vibrant with glow effects

### Dark Mode

```html
<!-- Enable dark mode -->
<html class="dark">
  <!-- All components adapt automatically -->
</html>
```

Toggle dark mode programmatically:

```javascript
// Toggle dark mode
document.documentElement.classList.toggle('dark');
```

---

## Customization

### Config-Based Theming

```php
// config/halo.php
return [
    'active_theme' => 'default',
    
    'dark_mode' => [
        'enabled' => true,
        'strategy' => 'class', // or 'media'
    ],
    
    'theme' => [
        'colors' => [
            'primary' => 'purple', // Change primary color
        ],
        'radius' => [
            'md' => 'rounded-xl', // More rounded
        ],
    ],
    
    'variants' => [
        'button' => [
            'gradient' => 'bg-gradient-to-r from-purple-500 to-pink-500 text-white',
        ],
    ],
];
```

### Component-Level Customization

```blade
<!-- Override with custom classes -->
<x-halo::button class="shadow-2xl transform hover:scale-110">
    Custom Button
</x-halo::button>
```

### Publishing & Editing

```bash
# Publish views to customize
php artisan vendor:publish --tag=halo-views

# Edit directly
resources/views/vendor/halo/components/halo/button.blade.php
```

---

## Documentation

### Component Documentation

Each component has detailed documentation in the `/docs` folder:

- Props and attributes
- Usage examples
- Variants and sizes
- Alpine.js integration
- Accessibility notes

### Helper Functions

```php
// Get theme value
theme('colors.primary'); // 'blue'

// Generate component classes
halo_classes('button', 'primary', 'lg', 'custom-class');

// Get default config
halo_default('button', 'variant'); // 'primary'

// Merge classes
halo_merge_classes($default, $custom);

// Alpine.js data
halo_alpine_data('modal', ['open' => false]);
```

---

## Testing

HaloUI uses Pest for clean, modern testing:

```bash
# Run tests
composer test

# Run with coverage
composer test-coverage
```

### Example Test

```php
it('renders button with variant', function () {
    $html = renderComponent('button', [
        'variant' => 'primary',
        'slot' => 'Click me'
    ]);
    
    expect($html)
        ->toContain('bg-blue-600')
        ->toContain('Click me');
});
```

---

## Contributing

Contributions are welcome! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

### Development Setup

```bash
# Clone repository
git clone https://github.com/halo-ui/core.git
cd core

# Install dependencies
composer install
npm install

# Run tests
composer test

# Build assets
npm run build
```

---

<!-- ## Resources

- **Documentation:** [https://haloui.dev/docs](https://haloui.dev/docs)
- **Storybook:** [https://storybook.haloui.dev](https://storybook.haloui.dev)
- **GitHub:** [https://github.com/halo-ui/core](https://github.com/halo-ui/core)
- **Discord:** [https://discord.gg/haloui](https://discord.gg/haloui)
- **Twitter:** [@HaloUI](https://twitter.com/HaloUI) -->

---

## License

HaloUI is open-sourced software licensed under the [MIT license](LICENSE).

---

## Credits

- Inspired by [shadcn/ui](https://ui.shadcn.com)
- Built with [TailwindCSS](https://tailwindcss.com)
- Powered by [Alpine.js](https://alpinejs.dev)
- Icons by [Blade Icons](https://github.com/blade-ui-kit/blade-icons)
- Developed for the Laravel community

---

## Why HaloUI?

✅ **70+ Components** — Everything you need  
✅ **8 Themes + Dark Mode** — Beautiful out of the box  
✅ **Copy-and-Own** — Total control  
✅ **Zero Lock-in** — Modify anything  
✅ **Laravel Native** — Built for Blade  
✅ **Production Ready** — Used in real projects  

---

<p align="center">
  <strong>HaloUI - Build with ❤️ by Aure Dulvresse</strong>
</p>

<!-- For questions, visit [https://haloui.dev](https://haloui.dev) -->
