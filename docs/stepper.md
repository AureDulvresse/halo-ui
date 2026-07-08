---
layout: default
title: Stepper
permalink: /components/stepper/
---

# Stepper

`resources/views/components/halo/stepper/{index,step}.blade.php`

A horizontal progress indicator for a multi-step flow (checkout, onboarding wizards, ...).

## Props

`stepper.index`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `current` | `int` | `1` | The 1-indexed active step |

`stepper.step`:

| Prop | Type | Default | Notes |
|---|---|---|---|
| `step` | `int` | — | This step's 1-indexed position (required) |
| `title` | `string` | — | The step's label (required) |
| `last` | `bool` | `false` | Omits the connecting line to the next step |

A step has no knowledge of the total step count, so it can't infer on its own whether it's the last one — pass `last` explicitly on the final `<x-halo::stepper.step>` to suppress its trailing connector.

## Examples

```blade
<x-halo::stepper :current="2">
    <x-halo::stepper.step :step="1" title="Account" />
    <x-halo::stepper.step :step="2" title="Shipping" />
    <x-halo::stepper.step :step="3" title="Confirm" last />
</x-halo::stepper>
```

## Accessibility

Rendered as an `<ol>` of `<li>` steps, reflecting that a stepper is an ordered sequence. A completed step's number is replaced with a checkmark icon for a quicker visual scan; the underlying step number remains in the DOM (hidden) for a screen reader announcing the list item's text content.

## Implementation

Registered as `Alpine.data('haloStepper', ...)` in `resources/js/init.js`.
