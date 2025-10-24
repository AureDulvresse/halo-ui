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

---

## Project Overview

**HaloUI** is a **professional, modular UI component library** for **Laravel 12+**, designed to accelerate development of modern web applications.  
Built with **Blade**, **TailwindCSS**, and **Alpine.js**, HaloUI offers **reusable, composable, and customizable components** following a consistent design language.

Key Features:

- Fully modular components, install individually or all at once
- Themeable via CSS variables for full customization
- Alpine.js-ready for interactive UI
- Snapshots and unit testing included for reliability
- Perfect for admin panels, dashboards, and SaaS applications

---

## Installation

```bash
composer require ironflow/halo-ui

php artisan vendor:publish --tag=halo-ui-components
php artisan vendor:publish --tag=halo-ui-assets
```

### Installing Components

```bash
# Install a single component
php artisan halo:install button

# Force reinstall a component
php artisan halo:install modal --force

# Install all components
php artisan halo:install
```

---

## Usage Examples

```blade
<x-halo:button variant="primary" size="lg">Click Me</x-halo:button>

<x-halo:modal x-data="{ open: true }" x-show="open">
    <x-halo:modal-header>Title</x-halo:modal-header>
    <x-halo:modal-body>Content</x-halo:modal-body>
    <x-halo:modal-footer>
        <x-halo:button @click="$el.closest('[x-data]').__x.$data.open = false">Close</x-halo:button>
    </x-halo:modal-footer>
</x-halo:modal>

<x-halo:select placeholder="Choose an option">
    <x-halo:select-item value="option1">Option 1</x-halo:select-item>
    <x-halo:select-item value="option2">Option 2</x-halo:select-item>
</x-halo:select>
```

## Theme & Customization

All components can be customized using CSS variables:

```css
:root {
  --color-primary: #3b82f6;
  --color-primary-hover: #2563eb;
  --color-secondary: #6b7280;
  --color-secondary-hover: #4b5563;
  --color-danger: #ef4444;
  --color-danger-hover: #dc2626;
  --color-background: #ffffff;
  --color-text: #111827;
  --color-border: #d1d5db;
  --color-hover: #f3f4f6;
}
```

---

## Testing

HaloUI includes:

- Unit tests for component rendering and props
- Snapshot tests for Alpine.js interactions

Run tests with:

```bash
php artisan test
```

---

## Contribution

We welcome contributions!

1. Fork the repository
2. Add new components under `Halo\UI\Components`
3. Add Blade stubs in `stubs/components`
4. Write unit tests for each component
5. Submit a pull request

For major changes, please open an issue first to discuss your proposal.

---

## License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

<p align="center">
  <strong>HaloUI - Build with ❤️ by Aure Dulvresse</strong>
</p>
