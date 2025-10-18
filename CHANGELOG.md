# Changelog

All notable changes to IronFlow will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2025-10-17

### Added

- Initial v1.0.0 scaffolding for HaloUI
- Service provider HaloUIServiceProvider for publishing components and assets
- CLI command halo:install supporting both stub folders and single stub files
- Base components implemented:
  - Button, Input, Textarea
  - Select + SelectItem
  - Modal
  - Dropdown
  - Card
- README v1.0.0 with installation instructions, usage examples, and component list
- Alpine.js hooks prepared for interactive components: Modal, Dropdown, Toast, Tooltip, Popover
- Theme customization via CSS variables
- Testing structure prepared for unit and snapshot tests

### Notes

- Not all planned components are included yet (Tabs, Accordion, Toast, Tooltip, Popover, BadgeShield, etc.)
- Future updates will add remaining components and advanced features
- v1.0.0 considered stable base for initial Packagist release

## Releases

[Unreleased]: https://github.com/ironflow-framework/ironflow/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/ironflow-framework/ironflow/releases/tag/v1.0.0
