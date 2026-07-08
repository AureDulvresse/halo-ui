@php
$classes = halo_merge_classes('w-full text-left text-sm text-halo-foreground', $attributes->get('class'));
@endphp

<div class="w-full overflow-x-auto rounded-halo border border-halo-border">
    <table {{ $attributes->except(['class'])->merge(['class' => $classes]) }}>
        {{ $slot }}
    </table>
</div>
