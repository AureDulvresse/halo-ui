@php
// [&_input]/[&_select]/[&_textarea] arbitrary-variant selectors strip the
// nested field's own border/ring/radius (see input.blade.php,
// select.blade.php, textarea.blade.php) so the group's own border is the
// only visible one instead of a doubled edge.
$classes = halo_merge_classes(
    'flex items-stretch rounded-halo border border-halo-border bg-halo-background focus-within:ring-2 focus-within:ring-halo-ring overflow-hidden [&_input]:border-0 [&_input]:ring-0 [&_input]:rounded-none [&_input]:focus-visible:ring-0 [&_select]:border-0 [&_select]:ring-0 [&_select]:rounded-none [&_textarea]:border-0 [&_textarea]:ring-0 [&_textarea]:rounded-none',
    $attributes->get('class'),
);
@endphp

<div {{ $attributes->except(['leading', 'trailing', 'class'])->merge(['class' => $classes]) }}>
    @isset($leading)
        <span class="flex shrink-0 items-center px-3 bg-halo-secondary text-halo-foreground/70 text-sm">
            {{ $leading }}
        </span>
    @endisset

    <div class="flex-1">
        {{ $slot }}
    </div>

    @isset($trailing)
        <span class="flex shrink-0 items-center px-3 bg-halo-secondary text-halo-foreground/70 text-sm">
            {{ $trailing }}
        </span>
    @endisset
</div>
