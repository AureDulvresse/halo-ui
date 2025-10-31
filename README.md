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
  <strong>A beautiful, modular UI component library for Laravel</strong>
</p>

<p align="center">
  Built with Blade, TailwindCSS, and Alpine.js
</p>

<p align="center">
  <a href="#installation">Installation</a> •
  <!-- <a href="#documentation">Documentation</a> • -->
  <a href="#components">Components</a> •
  <a href="#configuration">Configuration</a>
</p>

---

## Features

- **20+ Production-Ready Components** - From buttons to modals, everything you need  
- **Fully Customizable** - TailwindCSS-based styling, easy to override  
- **Copy & Own** - Install components into your project and customize freely  
- **Alpine.js Powered** - Lightweight, reactive interactions  
- **Laravel Native** - Built for Laravel 12+ with Blade components  
- **Zero Dependencies** - Only requires Laravel, TailwindCSS, and Alpine.js  
- **Accessible** - ARIA-compliant and keyboard navigable  
- **Responsive** - Mobile-first design approach  

## Installation

### Requirements

- PHP 8.2+
- Laravel 11.0+ or 12.0+
- TailwindCSS 3.0+
- Alpine.js 3.0+

### Step 1: Install the Package

```bash
composer require ironflow/halo-ui
```

### Step 2: Install Alpine.js

```bash
npm install alpinejs
```

Add Alpine.js to your `resources/js/app.js`:

```javascript
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
```

### Step 3: Configure Tailwind

Update your `tailwind.config.js` to include HaloUI paths:

```javascript
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/views/components/halo/**/*.blade.php', // Add this
  ],
  // ... rest of config
}
```

### Step 4: Publish Configuration (Optional)

```bash
php artisan vendor:publish --tag=halo-config
```

### Step 5: Install Components

Install all components:

```bash
php artisan halo:install --all
```

Or install specific components:

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
{{-- Trigger --}}
<x-halo.button @click="$dispatch('open-modal', { name: 'example' })">
    Open Modal
</x-halo.button>

{{-- Modal --}}
<x-halo.modal name="example">
    <x-halo.modal.header>
        Modal Title
    </x-halo.modal.header>
    
    <x-halo.modal.body>
        Modal content goes here.
    </x-halo.modal.body>
    
    <x-halo.modal.footer>
        <x-halo.button @click="show = false" variant="secondary">
            Cancel
        </x-halo.button>
        <x-halo.button variant="primary">
            Confirm
        </x-halo.button>
    </x-halo.modal.footer>
</x-halo.modal>
```

### Card

```blade
<x-halo.card>
    <x-halo.card.header>
        <h3 class="text-lg font-semibold">Card Title</h3>
    </x-halo.card.header>
    
    <x-halo.card.body>
        Card content goes here.
    </x-halo.card.body>
    
    <x-halo.card.footer>
        <x-halo.button variant="primary">Action</x-halo.button>
    </x-halo.card.footer>
</x-halo.card>
```

### Toast Notifications

```blade
{{-- Include in your layout --}}
<x-halo.toast />

{{-- Trigger from JavaScript --}}
<script>
    HaloUI.success('Success!', 'Your action was completed.');
    HaloUI.error('Error!', 'Something went wrong.');
    HaloUI.warning('Warning!', 'Please be careful.');
    HaloUI.info('Info', 'Here is some information.');
</script>

{{-- Or from Laravel controller --}}
return redirect()->back()->with('toast', [
    'type' => 'success',
    'title' => 'Success!',
    'message' => 'Action completed successfully.'
]);
```

### Dropdown

```blade
<x-halo.dropdown>
    <x-slot name="trigger">
        <x-halo.button>Options</x-halo.button>
    </x-slot>
    
    <x-halo.dropdown.item href="/profile">Profile</x-halo.dropdown.item>
    <x-halo.dropdown.item href="/settings">Settings</x-halo.dropdown.item>
    <x-halo.dropdown.item @click="logout()">Logout</x-halo.dropdown.item>
</x-halo.dropdown>
```

## Configuration

Customize HaloUI by editing `config/halo.php`:

```php
return [
    'theme' => [
        'colors' => [
            'primary' => 'blue',
            'secondary' => 'gray',
            // ...
        ],
        'default_radius' => 'md',
    ],
    'defaults' => [
        'button' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
    ],
];
```

## Customization

Since HaloUI follows the "copy and own" philosophy, you can freely modify any installed component:

1. Install the component: `php artisan halo:install button`
2. Edit the file: `resources/views/components/halo/button.blade.php`
3. Customize to your needs

Your changes will be preserved during package updates.

## JavaScript API

### Modal Methods

```javascript
// Open a modal
HaloUI.openModal('modal-name');

// Close all modals
HaloUI.closeModal();
```

### Toast Methods

```javascript
// Show success toast
HaloUI.success('Title', 'Message');

// Show error toast
HaloUI.error('Title', 'Message');

// Show warning toast
HaloUI.warning('Title', 'Message');

// Show info toast
HaloUI.info('Title', 'Message');

// Custom toast
HaloUI.toast('success', 'Title', 'Message');
```

## Testing

Run the test suite:

```bash
composer test
```

## Contributing

Contributions are welcome! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

HaloUI is open-sourced software licensed under the [MIT license](LICENSE.md).

## Credits

- Inspired by [shadcn/ui](https://ui.shadcn.com/)
- Built with [Laravel](https://laravel.com/)
- Styled with [TailwindCSS](https://tailwindcss.com/)
- Powered by [Alpine.js](https://alpinejs.dev/)

<p align="center">
  <strong>HaloUI - Build with ❤️ by Aure Dulvresse</strong>
</p>
