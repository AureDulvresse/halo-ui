@props([
    'items' => [],
    'selectable' => false,
])

<div x-data="{ 
    openItems: [],
    selectedItem: null,
    toggle(id) {
        if (this.openItems.includes(id)) {
            this.openItems = this.openItems.filter(i => i !== id);
        } else {
            this.openItems.push(id);
        }
    }
}" class="space-y-1">
    {{ $slot }}
</div>