@props([
    'multiple' => false,
    'defaultOpen' => null,
])

<div
    x-data="{
        openItems: {{ $defaultOpen ? "['$defaultOpen']" : '[]' }},
        multiple: {{ $multiple ? 'true' : 'false' }},
        toggle(item) {
            if (this.multiple) {
                if (this.openItems.includes(item)) {
                    this.openItems = this.openItems.filter(i => i !== item);
                } else {
                    this.openItems.push(item);
                }
            } else {
                this.openItems = this.openItems.includes(item) ? [] : [item];
            }
        },
        isOpen(item) {
            return this.openItems.includes(item);
        }
    }"
    {{ $attributes->merge(['class' => 'divide-y divide-gray-200 border border-gray-200 rounded-lg']) }}
>
    {{ $slot }}
</div>