# Layout: Two Column

`resources/views/components/halo/layout/two-column.blade.php`

A content area with a secondary sidebar — a docs page with a table of contents, a settings page with a section nav. Stacks vertically below `lg`, sits side-by-side above it. No JavaScript.

## Props

| Prop | Type | Default | Notes |
|---|---|---|---|
| `sidebarPosition` | `left`\|`right` | `left` | |
| `sidebarWidth` | Tailwind width class | `lg:w-64` | Applied to the `<aside>` |

Named slot: `sidebar`. Default slot: main content.

## Example

```blade
<x-halo::layout.two-column sidebar-position="right">
    <article class="prose">
        {{-- article body --}}
    </article>

    <x-slot:sidebar>
        <nav class="sticky top-6 space-y-1 text-sm">
            <a href="#intro">Introduction</a>
            <a href="#usage">Usage</a>
        </nav>
    </x-slot:sidebar>
</x-halo::layout.two-column>
```
