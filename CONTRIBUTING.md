# Contributing to HaloUI

Thank you for your interest in contributing to HaloUI!

## Project status

v4 is a from-scratch rebuild (see [CHANGELOG.md](CHANGELOG.md) for why) with one rule: **nothing is documented or merged until it's real, tested, and themed correctly.** Please hold contributions to that same bar — no components that "mostly work," no undocumented props, no skipped tests.

## Getting Started

1. **Fork the repository**
2. **Clone your fork locally**

   ```bash
   git clone https://github.com/AureDulvresse/halo-ui
   cd halo-ui
   ```

3. **Install dependencies**

   ```bash
   composer install
   npm install
   ```

4. **Run the checks**

   ```bash
   vendor/bin/pest         # test suite
   vendor/bin/pint --test  # code style
   npm run build           # compiles resources/css/halo.css and resources/js/init.js into public/
   ```

## Adding or changing a component

Every component in `resources/views/components/halo/` is an anonymous Blade component (`@props()` + a `.blade.php` file) — no PHP classes. Before opening a PR:

- **Follow the existing conventions.** Read a sibling component (e.g. `input.blade.php` for another form field, `dropdown/index.blade.php` for another Alpine-powered overlay) before inventing a new pattern.
- **Use `halo_variants()` / `halo_merge_classes()`** (in `src/helpers.php`) for variant/size classes, not ad hoc string concatenation — they handle a caller's `class` overriding the component's own defaults correctly, including the Tailwind axes that look like the same "family" but aren't (`border-b` vs `border-{color}`, `text-sm` vs `text-{color}`, etc. — see the comments in `halo_merge_classes()` if you're about to add a new tracked family).
- **Always exclude `class` from `$attributes` before every `->merge(['class' => ...])` call** (`$attributes->except([..., 'class'])`) — omitting it duplicates the caller's class in the output. Every component does this; a new one should too.
- **If the component needs Alpine.js interactivity**, register it as a named `Alpine.data(...)` or `Alpine.store(...)` in `resources/js/init.js` — not inline `x-data="{...}"` beyond something genuinely trivial and local (a single boolean, as in Alert's dismiss button).
- **If you pass an Alpine binding through a `<x-halo::...>` component tag** (e.g. `:style`, `:class` on `<x-halo::icon>`), use the double-colon escape (`::style`) — a single colon makes Blade evaluate the expression as PHP immediately, which fails since the expression is meant to run client-side. See the comment in `accordion/item.blade.php` for a worked example.
- **Bake in accessibility from the first version** — correct ARIA roles/attributes, keyboard behavior (escape to close, arrow keys to navigate a list of items, focus trapping for anything modal), not retrofitted later. Follow the relevant [WAI-ARIA APG pattern](https://www.w3.org/WAI/ARIA/apg/patterns/) for the component you're building.
- **Add a test file** in `tests/Components/` that renders the component via the `renderComponent()` helper (see `tests/Pest.php`) and asserts on the real output — props, variant classes, ARIA attributes. Since Pest can't execute JavaScript, interactive behavior is verified at the markup level (the right `x-data`/`x-on`/`role` attributes are present) — say so in the test name if that's the limit of what's being checked.
- **Add a doc page** at `docs/{component}.md` (props table, example, accessibility notes) and list it in `docs/_config.yml`'s navigation. Update the component table in `README.md` and add an entry to `CHANGELOG.md`.

## Icons

Icons live in `resources/icons/halo/*.svg`, one file per icon, registered as a Blade Icons set (prefix `halo`) in `HaloServiceProvider::registerBladeIcons()`. Keep new icons consistent with the existing ones:

```svg
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" d="..." />
</svg>
```

24×24 viewBox, `stroke-width="1.5"`, `stroke="currentColor"`, no fill — this is what lets `<x-halo::icon size="..." class="text-halo-primary">` control size and color uniformly across every icon.

## Guidelines

- Follow **PSR-12** coding standards (`vendor/bin/pint` enforces this — run it before committing).
- Don't add a feature, prop, or abstraction beyond what's actually needed — no speculative generality for hypothetical future use cases.
- Use **Tailwind utility classes** for styling; there is no component-specific CSS file.

## Pull Requests

- Branch from the repository's default branch for each feature or fix:

  ```bash
  git checkout -b feature/my-new-component
  ```

- Commit with a descriptive message (conventional commits are welcome but not required):

  ```bash
  git commit -m "feat: add Tooltip component"
  ```

- Push to your fork and open a **Pull Request** against the default branch.
- Ensure `vendor/bin/pest`, `vendor/bin/pint --test`, and `npm run build` all pass, and describe what changed and why.

## Reporting Issues

Use GitHub Issues. Include a clear description, steps to reproduce, and the actual vs. expected rendered output (a code snippet is usually faster than a screenshot for a Blade component).

## Code of Conduct

By contributing to HaloUI, you agree to follow the [Contributor Covenant Code of Conduct](https://www.contributor-covenant.org/).

---

Thank you for helping make HaloUI better!
