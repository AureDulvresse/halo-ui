# Contributing to HaloUI

Thank you for your interest in contributing to HaloUI! Your contributions help make this library better and more robust.

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
   npm install && npm run dev
   ```

4. **Run tests**

   ```bash
   php artisan test
   ```

## Guidelines

- Follow **PSR-12 coding standards**.
- Keep **components modular and reusable**.
- Include **Alpine.js interactivity** if the component requires it.
- Use **TailwindCSS utility classes** for styling.
- Write **unit tests** for any new functionality or component.

## Pull Requests

- Create a new branch from `main` for each feature or fix:

  ```bash
  git checkout -b feature/my-new-component
  ```

- Commit your changes with a descriptive message:

  ```bash
  git commit -m "feat: add new component X"
  ```

- Push to your fork and open a **Pull Request** against `main`.
- Ensure all tests pass and include a brief description of what your PR does.

## Reporting Issues

- Use GitHub Issues to report bugs or request new features.
- Provide a clear description, steps to reproduce, and any relevant screenshots or code snippets.

## Code of Conduct

By contributing to HaloUI, you agree to follow the [Contributor Covenant Code of Conduct](https://www.contributor-covenant.org/).

---

Thank you for helping make HaloUI better! Your contributions are appreciated ❤️.
