# PrismUI v1.0.0

[![Version](https://img.shields.io/badge/version-1.0.0-blue)](https://github.com/your-username/prismui/releases)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue?logo=php)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12%2B-red?logo=laravel)](https://laravel.com/)
[![Tests](https://img.shields.io/badge/tests-passing-brightgreen)](#testing)
[![GitHub issues](https://img.shields.io/github/issues/AureDulvresse/prism-ui)](https://github.com/AureDulvresse/prism-ui/issues)

---

## Project Overview

**PrismUI** is a **professional, modular UI component library** for **Laravel 12+**, designed to accelerate development of modern web applications.  
Built with **Blade**, **TailwindCSS**, and **Alpine.js**, PrismUI offers **reusable, composable, and customizable components** following a consistent design language.

Key Features:

- Fully modular components, install individually or all at once
- Themeable via CSS variables for full customization
- Alpine.js-ready for interactive UI
- Snapshots and unit testing included for reliability
- Perfect for admin panels, dashboards, and SaaS applications

---

## Installation

```bash
composer require prism/ui

php artisan vendor:publish --tag=prism-ui-components
php artisan vendor:publish --tag=prism-ui-assets
```

### Installing Components

```bash
# Install a single component
php artisan prism:install button

# Force reinstall a component
php artisan prism:install modal --force

# Install all components
php artisan prism:install
```

---

## 🛠 Usage Examples

```blade
<x-prism:button variant="primary" size="lg">Click Me</x-prism:button>

<x-prism:modal x-data="{ open: true }" x-show="open">
    <x-prism:modal-header>Title</x-prism:modal-header>
    <x-prism:modal-body>Content</x-prism:modal-body>
    <x-prism:modal-footer>
        <x-prism:button @click="$el.closest('[x-data]').__x.$data.open = false">Close</x-prism:button>
    </x-prism:modal-footer>
</x-prism:modal>

<x-prism:select placeholder="Choose an option">
    <x-prism:select-item value="option1">Option 1</x-prism:select-item>
    <x-prism:select-item value="option2">Option 2</x-prism:select-item>
</x-prism:select>
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

PrismUI includes:

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
2. Add new components under `Prism\UI\Components`
3. Add Blade stubs in `stubs/components`
4. Write unit tests for each component
5. Submit a pull request

For major changes, please open an issue first to discuss your proposal.

---

## License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

<p align="center">
  <strong>PrismUI - Build with ❤️ by Aure Dulvresse</strong>
</p>
