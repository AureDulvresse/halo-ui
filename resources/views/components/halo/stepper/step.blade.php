@props([
    'step',
    'title',
    'last' => false,
])

@php
$classes = halo_merge_classes('flex items-center', $last ? '' : 'flex-1', $attributes->get('class'));
@endphp

{{--
    Whether a step is the last one can't be inferred from inside the step
    itself (it has no knowledge of the total step count), so the connector
    line is opt-out via an explicit `last` prop on the final <x-halo::stepper.step>
    rather than the index trying to inject positional context into its slot.
--}}
<li {{ $attributes->except(['step', 'title', 'last', 'class'])->merge(['class' => $classes]) }}>
    <div class="flex items-center gap-2">
        <span
            :class="isComplete({{ (int) $step }}) ? 'bg-halo-success text-halo-success-foreground' : (isActive({{ (int) $step }}) ? 'bg-halo-primary text-halo-primary-foreground' : 'bg-halo-secondary text-halo-foreground/50')"
            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-sm font-medium"
        >
            {{-- ::class (double colon) is required here, not :class — <x-halo::icon> is a
                 real Blade component tag, so a single-colon attribute is evaluated as PHP
                 immediately (and "isComplete" isn't a PHP function). The double colon tells
                 Blade to emit it as a literal attribute instead, so Alpine binds it client-side. --}}
            <x-halo::icon
                name="check"
                size="sm"
                ::class="isComplete({{ (int) $step }}) ? '' : 'hidden'"
            />
            <span :class="isComplete({{ (int) $step }}) ? 'hidden' : ''">{{ $step }}</span>
        </span>

        <span
            :class="isActive({{ (int) $step }}) ? 'text-halo-foreground' : 'text-halo-foreground/50'"
            class="text-sm font-medium"
        >
            {{ $title }}
        </span>
    </div>

    @unless($last)
        <span class="mx-3 h-px flex-1 bg-halo-border"></span>
    @endunless
</li>
