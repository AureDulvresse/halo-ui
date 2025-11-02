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
  <strong>Modern, Beautiful UI Components for Laravel</strong><br>
  Built with Blade, TailwindCSS 3+, and Alpine.js 3+
</p>

<p align="center">
  <a href="#installation">Installation</a> •
  <a href="#features">Features</a> •
  <a href="#components">Components</a> •
  <a href="#documentation">Documentation</a> •
  <a href="#examples">Examples</a>
</p>

---

## What's New in v2.1

**Modern Design System** - Gradient buttons, glassmorphism effects, smooth animations
**Enhanced Icon Integration** - Full Blade UI Kit support with intelligent fallbacks
**Alpine Stores** - Global state management for modals, toasts, and themes
**49 Components** - Complete library with advanced form components
**Performance Optimized** - Lazy loading, caching, and minification support
**Dark Mode Ready** - Built-in theme switching with persistence
**IronFlow Form Builder** - Integrated form builder package (coming soon)

## Features

### Modern Design Language

- **Gradient-based variants** with glow effects
- **Glassmorphism** support for modern UIs
- **Smooth animations** with customizable timing
- **Responsive** mobile-first design
- **Accessible** ARIA-compliant components

### Developer Experience

- **Copy-and-own** philosophy - full component customization
- **Interactive CLI** installer with dependency resolution
- **TypeScript-ready** with full type definitions
- **Hot reload** support for development
- **Comprehensive testing** with PHPUnit/Pest
- **Theme System**
  - CSS variables for dynamic theming
  - Gradient & Glass morphism effects
  - Dark mode with system detection
  - Component-level theme overrides

### Performance

- **Lazy loading** for heavy components
- **Minimal JavaScript** footprint with Alpine.js
- **Optimized rendering** with Blade caching
- **Production builds** with minification

## Installation

### Requirements

- PHP 8.2+
- Laravel 11+ or 12+
- TailwindCSS 3.0+
- Alpine.js 3.0+
- Blade UI Kit (optional, recommended)

### Quick Install

```bash
# 1. Install HaloUI
composer require halo/ui

# 2. Install Alpine.js & dependencies
npm install alpinejs

# 3. Install Blade UI Kit (recommended for icons)
composer require blade-ui-kit/blade-heroicons

# 4. Install components
php artisan halo:install --all

# 5. Configure Tailwind
# Add to tailwind.config.js content array:
'./resources/views/components/halo/**/*.blade.php',
```

### Configuration

```bash
# Publish configuration
php artisan vendor:publish --tag=halo-config

# Publish assets
php artisan vendor:publish --tag=halo-assets

# Publish templates (optional)
php artisan vendor:publish --tag=halo-templates
```

### Setup Alpine.js

```javascript
// resources/js/app.js
import Alpine from "alpinejs";

// Import HaloUI
import "../../../vendor/halo/ui/resources/js/halo.js";

window.Alpine = Alpine;
Alpine.start();
```

### Include in Layout

```blade
<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}

    {{-- Toast Container --}}
    <x-halo.toast />
</body>
</html>
```

## Components (49 Total)

### Form Components (8)

- **Button** - Gradient variants with glow effects
- **Input** - Enhanced with icons and clearable option
- **Textarea** - Auto-resize with character counter
- **Select** - Custom styled dropdown
- **Checkbox** - Modern toggle design
- **Radio** - Styled radio buttons
- **Toggle** - iOS-style toggle
- **Rating** - Interactive star ratings

### Advanced Form Components (6)

- **FileUpload** - Drag & drop with preview
- **DatePicker** - Calendar date selection
- **TimePicker** - Time selection (12h/24h)
- **RichText** - WYSIWYG editor
- **ColorPicker** - Color selection
- **SliderRange** - Range slider input

### Layout Components (7)

- **Card** - Elevated, flat, bordered, glass variants
- **Modal** - Animated dialogs with Alpine store
- **Navbar** - Responsive navigation
- **Sidebar** - Collapsible side navigation
- **Breadcrumb** - Navigation trail
- **Accordion** - Collapsible sections
- **BottomSheet** - Mobile bottom drawer

### Feedback Components (8)

- **Alert** - Contextual messages
- **Toast** - Gradient toasts with progress bar
- **Badge** - Status indicators
- **Spinner** - Loading indicators
- **Progress** - Progress bars with animations
- **Skeleton** - Loading placeholders
- **EmptyState** - No data displays
- **Notification** - Persistent notifications

### Navigation (5) & Data Display (11)

- Dropdown, Tab, Pagination, Timeline, Stepper
- Table, Tooltip, Avatar, AvatarGroup, Divider
- Stats, Chip, Kbd, Code, Popover, Icon

### Advanced Components (9)

- ContextMenu, CommandPalette, Carousel, Calendar
- ImageCropper, TreeView, Kanban (Board/Column/Card)

## Usage Examples

### Modern Button with Icon

```blade
<x-halo.button variant="primary" icon="plus" size="lg">
    Add New Item
</x-halo.button>

<x-halo.button variant="glass" icon="heart" icon-position="right">
    Glassmorphism
</x-halo.button>

<x-halo.button variant="gradient-sunset" :loading="true">
    Processing...
</x-halo.button>
```

### Modal with Alpine Store

```blade
{{-- Trigger --}}
<x-halo.button @click="HaloUI.modal.open('user-modal')">
    Open Modal
</x-halo.button>

{{-- Modal --}}
<x-halo.modal name="user-modal" size="lg">
    <x-halo.modal.header closeable>
        Create New User
    </x-halo.modal.header>

    <x-halo.modal.body>
        <x-halo.input
            name="name"
            label="Full Name"
            icon="user"
            :clearable="true"
        />
    </x-halo.modal.body>

    <x-halo.modal.footer>
        <x-halo.button @click="HaloUI.modal.close('user-modal')" variant="outline">
            Cancel
        </x-halo.button>
        <x-halo.button variant="primary">
            Create
        </x-halo.button>
    </x-halo.modal.footer>
</x-halo.modal>
```

### Toast Notifications

```blade
{{-- In Blade --}}
<x-halo.button @click="HaloUI.toast.success('Success!', 'Item created successfully')">
    Show Toast
</x-halo.button>

{{-- In Controller --}}
return redirect()->back()->with('toast', [
    'type' => 'success',
    'title' => 'Saved!',
    'message' => 'Changes have been saved successfully.'
]);

{{-- In JavaScript --}}
HaloUI.toast.error('Error!', 'Something went wrong');
HaloUI.toast.warning('Warning!', 'Please review your input');
HaloUI.toast.info('Info', 'New features available');
```

### Modern Card Design

```blade
<x-halo.card variant="glass" :interactive="true">
    <x-halo.card.header>
        <h3 class="text-xl font-bold">Premium Feature</h3>
    </x-halo.card.header>

    <x-halo.card.body>
        <p class="text-gray-600">
            Glassmorphism card with interactive hover effect
        </p>
    </x-halo.card.body>

    <x-halo.card.footer>
        <x-halo.button variant="gradient-ocean" class="w-full">
            Upgrade Now
        </x-halo.button>
    </x-halo.card.footer>
</x-halo.card>
```

## 🎯 JavaScript API

```javascript
// Modal API
HaloUI.modal.open("modal-name");
HaloUI.modal.close("modal-name");
HaloUI.modal.closeAll();

// Toast API
HaloUI.toast.success("Title", "Message");
HaloUI.toast.error("Title", "Message");
HaloUI.toast.warning("Title", "Message");
HaloUI.toast.info("Title", "Message");

// Theme API
HaloUI.theme.toggle();
HaloUI.theme.set("dark");
const mode = HaloUI.theme.get();

// Utilities
HaloUI.utils.debounce(func, 300);
HaloUI.utils.throttle(func, 100);
HaloUI.utils.copyToClipboard(text);
```

## 🎨 Theming & Customization

### Design Styles

```php
// config/halo.php
'design' => [
    'style' => 'modern', // modern, minimal, brutalist, glassmorphism
]
```

### Custom Colors

```php
'colors' => [
    'primary' => [
        500 => '#your-color',
        600 => '#your-hover-color',
    ],
]
```

### Component Overrides

After installation, all components are in `resources/views/components/halo/` - modify freely!

<!-- ## Full Documentation

- [Installation Guide](docs/installation.md)
- [Configuration](docs/configuration.md)
- [Component Reference](docs/components/)
- [JavaScript API](docs/javascript-api.md)
- [Theming Guide](docs/theming.md)
- [Form Builder](docs/form-builder.md) -->

## 🧪 Testing

```bash
# Run tests
composer test

# Run with coverage
composer test-coverage

# Run specific test
php artisan test tests/Feature/ComponentRenderTest.php
```

## Contributing

Contributions are welcome! See [CONTRIBUTING.md](CONTRIBUTING.md)

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for version history

## License

MIT License - see [LICENSE.md](LICENSE.md)

## Credits

- Built with [Laravel](https://laravel.com/)
- Styled with [TailwindCSS](https://tailwindcss.com/)
- Powered by [Alpine.js](https://alpinejs.dev/)
- Icons from [Blade UI Kit](https://blade-ui-kit.com/)
- Inspired by [shadcn/ui](https://shadcn.com/)

<p align="center">
  <strong>HaloUI - Build with ❤️ by Aure Dulvresse</strong>
</p>
