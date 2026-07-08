# HaloUI

<p align="start">
  <a href="https://packagist.org/packages/ironflow/halo-ui">
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
  Elegant as shadcn/ui, native as Blade. Built with Tailwind CSS v4, Alpine.js, and Blade Icons.
</p>

<p align="center">
  <a href="#status">Status</a> •
  <a href="#installation">Installation</a> •
  <a href="#components">Components</a> •
  <a href="#theming">Theming</a> •
  <a href="#customization">Customization</a> •
  <a href="#testing">Testing</a> •
  <a href="#contributing">Contributing</a>
</p>

---

## Status

**v4 is a from-scratch rebuild, currently at an early, deliberately small stage.** Earlier versions accumulated dead code and a documentation/reality gap (classes and templates that were never wired up, a theme system that didn't actually theme anything). Rather than carry that forward, v4 starts over with a strict rule: **every component that exists is real, tested, and themed correctly** — nothing is listed here until it ships.

Today that's **20 components**. More are added incrementally; see [CHANGELOG.md](CHANGELOG.md) for what's shipped and `docs/` for what's next.

## Features

- **Anonymous Blade components** — no PHP classes to maintain, just `@props()` and a Blade file
- **Real runtime theming** — colors, radius, and dark/light are CSS custom properties (`--halo-*`) mapped into Tailwind v4 via `@theme`; switching themes changes an attribute, not a build step
- **Copy-and-own** — works out of the box after `composer require`; `php artisan halo:install` is an optional eject for full customization
- **Blade Icons integration** — icons resolve through Blade Icons' native component API, not a hand-rolled resolver
- **Accessible by default** — ARIA attributes and keyboard behavior are part of a component's first version, not an afterthought
- **Alpine.js for interactivity** — registered as named `Alpine.data()`/`Alpine.store()`, invoked directly in Blade

---

## Installation

### Requirements

- PHP 8.2+
- Laravel 11+ or 12+
- Tailwind CSS v4
- Alpine.js 3.x

### Install via Composer

```bash
composer require ironflow/halo-ui
```

Components are usable immediately — `<x-halo::button>`, `<x-halo::input>`, `<x-halo::badge>` — no publish step required.

### Configure Tailwind

Tailwind v4 discovers content automatically in most setups. If you need to point it explicitly at the package's components, add to your CSS entry file:

```css
@import "tailwindcss";
@source "../../vendor/ironflow/halo-ui/resources/views";
```

### Include Alpine.js and the theme tokens

In your layout:

```html
<!DOCTYPE html>
<html lang="en" data-theme="halo">
<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}
</body>
</html>
```

Your app's own CSS entry should import the package's tokens and Alpine.js should be bundled or loaded — see [Theming](#theming) below for the `@theme` setup and [resources/js/init.js](resources/js/init.js) for the Alpine registration pattern.

### Eject and customize (optional)

`halo:install` copies the package's own component files into your app, so you can edit them directly:

```bash
# Eject every component
php artisan halo:install --all

# Eject specific components
php artisan halo:install button input

# Overwrite files already ejected
php artisan halo:install --all --force
```

Once ejected to `resources/views/components/halo/`, your local copy takes precedence — the package's own components still work for anything you didn't eject.

---

## Quick Start

```blade
<x-halo::button variant="primary" icon="check">
    Save changes
</x-halo::button>

<x-halo::input
    name="email"
    type="email"
    icon="mail"
    placeholder="you@example.com"
/>

<x-halo::badge variant="success">Active</x-halo::badge>

<x-halo::icon name="user" size="lg" />

<x-halo::alert variant="danger" dismissible>
    Something went wrong — please try again.
</x-halo::alert>

{{-- Modal: opened by name, from anywhere --}}
<x-halo::button @click="$dispatch('open-modal', 'confirm-delete')">
    Delete account
</x-halo::button>

<x-halo::modal name="confirm-delete">
    <x-halo::modal.header>Delete account?</x-halo::modal.header>
    <x-halo::modal.body>This can't be undone.</x-halo::modal.body>
    <x-halo::modal.footer>
        <x-halo::button variant="outline" @click="$dispatch('close-modal')">Cancel</x-halo::button>
        <x-halo::button variant="danger">Delete</x-halo::button>
    </x-halo::modal.footer>
</x-halo::modal>
```

---

## Components

Full props reference for each lives in `docs/{component}.md`; this is the map.

### Form

| Component | Notes |
|-----------|-------|
| **Button** | Variants `primary`/`secondary`/`outline`/`ghost`/`danger`; sizes `sm`/`md`/`lg`; `icon`, `iconPosition`, `loading`, `disabled` |
| **Input** | Sizes `sm`/`md`/`lg`; `icon`, `iconPosition`, `invalid`, `disabled`, auto-generated `id` |
| **Textarea** | Same size/invalid/disabled pattern as Input, plus `rows` and `resize` |
| **Label** | Pairs with any field via `for`; `required` adds a decorative `*` |
| **Checkbox** | Native `<input type="checkbox">` wrapped in a `<label>`; themed via `accent-halo-primary` |
| **Radio** | Same pattern as Checkbox; never derives its `id` from the shared group `name` |
| **Select** | `options` prop (`value => label`) or slot-authored `<option>` tags |

### Display

| Component | Notes |
|-----------|-------|
| **Icon** | Resolves any icon in the `halo` Blade Icons set (`resources/icons/halo/*.svg`) by name; sizes `xs`–`xl` |
| **Badge** | Variants `primary`/`secondary`/`success`/`danger`/`warning` |
| **Avatar** | `src` image, `initials` fallback, or generic icon; `status` dot |
| **Spinner** | Standalone loading indicator; also used internally by Button's `loading` state |
| **Divider** | Horizontal (with optional centered `label`) or `vertical` |
| **Card** (+ `.header`/`.body`/`.footer`) | Variants `default`/`bordered`/`elevated` |

### Feedback

| Component | Notes |
|-----------|-------|
| **Alert** | Variants `info`/`success`/`warning`/`danger`, each with a matching default icon; `dismissible` |

### Overlays (Alpine-powered)

| Component | Notes |
|-----------|-------|
| **Modal** (+ `.header`/`.body`/`.footer`) | Opened/closed by `name` via `$dispatch('open-modal', name)` — no `:open` prop to sync; traps focus while open, returns it to the trigger on close |
| **Dropdown** (+ `.item`) | `trigger` named slot; arrow keys move between items, closes on escape/outside click/selecting an item, returns focus to the trigger |
| **Toast** | One global queue rendered by a single `<x-halo::toast />`; push via `$store.haloToast.push(message, variant)` |

### Navigation (Alpine-powered)

| Component | Notes |
|-----------|-------|
| **Tabs** (`.list`, `.trigger`, `.panel`) | `default` active tab; arrow keys roam between triggers |
| **Accordion** (+ `.item`) | `multiple` allows more than one item open at once; each item tracked by an explicit `name` or an auto-generated one |
| **Breadcrumb** (+ `.item`) | `href` for links, `current` for the non-interactive last item |

Each component's props, variant maps, and rendered markup live directly in its `.blade.php` file under `resources/views/components/halo/` — read the source, it's short by design.

See [CHANGELOG.md](CHANGELOG.md) for release history and `docs/` for per-component prop references.

---

## Theming

Colors, radius, and light/dark are CSS custom properties defined in `resources/css/theme.css`, scoped to a `data-theme` attribute, and mapped into real Tailwind utility classes (`bg-halo-primary`, `rounded-halo`, ...) via Tailwind v4's `@theme` directive. There is no build-time "active theme" setting — switching themes means changing an attribute.

### Built-in themes

| Theme | `data-theme` | Character |
|-------|--------------|-----------|
| **Halo** | `halo` (default) | Blue, neutral radius — the baseline |
| **Aurora** | `aurora` | Violet/teal accent, larger radius |
| **Eclipse** | `eclipse` | Dark background, same blue family as Halo |

```html
<html data-theme="eclipse">
```

### Switching at runtime

`resources/js/init.js` registers an `Alpine.store('haloTheme', ...)` that persists the choice in `localStorage` and applies it to `<html>`:

```html
<button @click="$store.haloTheme.set('aurora')">Aurora</button>
```

Render the correct theme on first paint (before Alpine boots) by reading the configured default server-side:

```blade
<html data-theme="{{ config('halo.theme.default') }}">
```

### Adding a theme

Add a `[data-theme="yourname"]` block to `resources/css/theme.css` defining the same `--halo-*` variables as the existing themes, then add `'yourname'` to `config('halo.theme.available')` and to the `THEMES` array in `resources/js/init.js`.

---

## Customization

### Component-level

Every component merges any extra classes you pass, with the last-wins conflict resolution in `halo_merge_classes()` — a class you pass always overrides the component's own default for the same Tailwind utility family (`bg-*`, `text-*`, `p{x,y,...}-*`, etc.):

```blade
<x-halo::button class="px-10">
    Wider button
</x-halo::button>
```

### Defaults

`config/halo.php` sets each component's default variant/size:

```php
'defaults' => [
    'button' => ['variant' => 'primary', 'size' => 'md'],
],
```

### Helper functions

```php
// CVA-style variant recipe: base classes + variant/size maps + defaults
halo_variants($config, $props, $extraClass);

// Merge class strings, deduping conflicting utilities (last wins)
halo_merge_classes(...$classGroups);

// Read a component's configured default prop
halo_default('button', 'variant'); // 'primary'

// Read a theme.* config value
theme('radius'); // 'rounded-halo'
```

---

## Testing

HaloUI uses Pest:

```bash
composer test
composer test-coverage
```

```php
it('applies the default variant and size classes', function () {
    $html = renderComponent('button', ['slot' => 'Save']);

    expect($html)
        ->toHaveClass('bg-halo-primary')
        ->toHaveClass('px-4 py-2');
});
```

Every component has a render test in `tests/Components/`, including a regression test on Icon that guards against a real bug this rebuild fixed (an icon resolver that could recurse into itself).

---

## Contributing

Contributions are welcome — see [CONTRIBUTING.md](CONTRIBUTING.md).

```bash
git clone https://github.com/AureDulvresse/halo-ui.git
cd halo-ui
composer install
npm install

composer test
vendor/bin/pint --test
npm run build
```

---

## License

HaloUI is open-sourced software licensed under the [MIT license](LICENSE).

## Credits

- Inspired by [shadcn/ui](https://ui.shadcn.com)
- Built with [Tailwind CSS](https://tailwindcss.com)
- Powered by [Alpine.js](https://alpinejs.dev)
- Icons by [Blade Icons](https://github.com/blade-ui-kit/blade-icons)

---

<p align="center">
  <strong>HaloUI — Built with ❤️ by Aure Dulvresse</strong>
</p>
