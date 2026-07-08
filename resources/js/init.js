/**
 * HaloUI — Alpine.js registration.
 *
 * Interactive components register a named Alpine.data() factory here and
 * are invoked in Blade as x-data="haloX()". Global, cross-component state
 * (like the active theme, or the toast queue) is registered as an
 * Alpine.store() instead.
 */

import Alpine from 'alpinejs';

const THEMES = ['halo', 'aurora', 'eclipse', 'ember', 'nocturne'];
const STORAGE_KEY = 'halo-theme';

// Elements a focus trap / roving tabindex should consider stoppable points.
const FOCUSABLE_SELECTOR = 'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])';

document.addEventListener('alpine:init', () => {
    Alpine.store('haloTheme', {
        available: THEMES,
        current: localStorage.getItem(STORAGE_KEY) || 'halo',

        set(name) {
            if (!THEMES.includes(name)) {
                return;
            }

            this.current = name;
            document.documentElement.setAttribute('data-theme', name);
            localStorage.setItem(STORAGE_KEY, name);
        },

        init() {
            document.documentElement.setAttribute('data-theme', this.current);
        },
    });

    // Modal: identified by name, opened/closed from anywhere via
    // $dispatch('open-modal', 'name') / $dispatch('close-modal', 'name').
    // A missing detail on close-modal closes every open modal. Traps focus
    // inside the panel while open and returns it to whatever triggered the
    // modal on close, per the WAI-ARIA dialog pattern.
    Alpine.data('haloModal', (name) => ({
        name,
        open: false,
        previouslyFocused: null,

        init() {
            window.addEventListener('open-modal', (event) => {
                if (event.detail === this.name) {
                    this.show();
                }
            });

            window.addEventListener('close-modal', (event) => {
                if (!event.detail || event.detail === this.name) {
                    this.close();
                }
            });
        },

        show() {
            this.previouslyFocused = document.activeElement;
            this.open = true;
            this.$nextTick(() => this.focusFirst());
        },

        close() {
            if (!this.open) {
                return;
            }

            this.open = false;

            if (this.previouslyFocused instanceof HTMLElement) {
                this.previouslyFocused.focus();
            }

            this.previouslyFocused = null;
        },

        focusFirst() {
            const panel = this.$refs.panel;

            if (!panel) {
                return;
            }

            const focusable = panel.querySelectorAll(FOCUSABLE_SELECTOR);

            (focusable[0] ?? panel).focus();
        },

        trapFocus(event) {
            const panel = this.$refs.panel;

            if (!panel) {
                return;
            }

            const focusable = Array.from(panel.querySelectorAll(FOCUSABLE_SELECTOR));

            if (!focusable.length) {
                return;
            }

            const first = focusable[0];
            const last = focusable[focusable.length - 1];

            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        },
    }));

    // Dropdown: local open/closed state, closed on escape, on clicking
    // outside, or on selecting an item. Arrow keys move focus between
    // items (WAI-ARIA menu pattern); focus returns to the trigger on close.
    Alpine.data('haloDropdown', () => ({
        open: false,
        previouslyFocused: null,

        toggle() {
            this.open ? this.close() : this.openMenu();
        },

        openMenu() {
            this.previouslyFocused = document.activeElement;
            this.open = true;
            this.$nextTick(() => this.focusFirstItem());
        },

        close() {
            if (!this.open) {
                return;
            }

            this.open = false;

            if (this.previouslyFocused instanceof HTMLElement) {
                this.previouslyFocused.focus();
            }

            this.previouslyFocused = null;
        },

        closeOnItemClick(event) {
            if (event.target.closest('[role="menuitem"]')) {
                this.close();
            }
        },

        menuItems() {
            return Array.from(this.$refs.panel?.querySelectorAll('[role="menuitem"]') ?? []);
        },

        focusFirstItem() {
            this.menuItems()[0]?.focus();
        },

        focusNext() {
            const items = this.menuItems();

            if (!items.length) {
                return;
            }

            const index = items.indexOf(document.activeElement);

            (items[index + 1] ?? items[0]).focus();
        },

        focusPrevious() {
            const items = this.menuItems();

            if (!items.length) {
                return;
            }

            const index = items.indexOf(document.activeElement);

            (items[index - 1] ?? items[items.length - 1]).focus();
        },
    }));

    // Tabs: single active tab tracked by an arbitrary string key. Arrow keys
    // roam between triggers (WAI-ARIA tabs pattern).
    Alpine.data('haloTabs', (active = null) => ({
        active,

        select(tab) {
            this.active = tab;
        },

        isActive(tab) {
            return this.active === tab;
        },

        focusSibling(event, direction) {
            const tabs = Array.from(this.$root.querySelectorAll('[role="tab"]'));
            const index = tabs.indexOf(event.target);
            const next = tabs[index + direction] ?? (direction > 0 ? tabs[0] : tabs[tabs.length - 1]);

            next.focus();
            next.click();
        },
    }));

    // Accordion: tracks which item(s) are open by an arbitrary string key.
    // `multiple` allows more than one open at once; otherwise opening an
    // item closes any other.
    Alpine.data('haloAccordion', (multiple = false) => ({
        multiple,
        openItems: [],

        isOpen(name) {
            return this.openItems.includes(name);
        },

        toggle(name) {
            if (this.isOpen(name)) {
                this.openItems = this.openItems.filter((item) => item !== name);

                return;
            }

            this.openItems = this.multiple ? [...this.openItems, name] : [name];
        },
    }));

    // Tooltip: shown on hover or focus of its trigger, hidden on the
    // opposite. Sets aria-describedby on the trigger's first element so
    // assistive tech announces the tooltip text, per the WAI-ARIA tooltip
    // pattern (no focus trap or dismiss key needed — it's not interactive).
    Alpine.data('haloTooltip', (id) => ({
        open: false,

        init() {
            this.$refs.trigger.firstElementChild?.setAttribute('aria-describedby', id);
        },

        show() {
            this.open = true;
        },

        hide() {
            this.open = false;
        },
    }));

    // Popover: like Dropdown but for arbitrary rich content rather than a
    // list of menu items — no role="menu"/arrow-key roving focus, just
    // open/close on trigger click, escape, or an outside click, with focus
    // returned to the trigger on close.
    Alpine.data('haloPopover', () => ({
        open: false,
        previouslyFocused: null,

        toggle() {
            this.open ? this.close() : this.openPanel();
        },

        openPanel() {
            this.previouslyFocused = document.activeElement;
            this.open = true;
            this.$nextTick(() => this.focusFirst());
        },

        close() {
            if (!this.open) {
                return;
            }

            this.open = false;

            if (this.previouslyFocused instanceof HTMLElement) {
                this.previouslyFocused.focus();
            }

            this.previouslyFocused = null;
        },

        focusFirst() {
            const panel = this.$refs.panel;

            if (!panel) {
                return;
            }

            const focusable = panel.querySelectorAll(FOCUSABLE_SELECTOR);

            (focusable[0] ?? panel).focus();
        },
    }));

    // FileUpload: a native <input type="file"> hidden behind a styled
    // drop zone. Removing a file rebuilds the input's FileList via
    // DataTransfer — a plain JS array can't be reassigned to input.files.
    Alpine.data('haloFileUpload', () => ({
        dragging: false,
        files: [],

        change(event) {
            this.setFiles(event.target.files);
        },

        drop(event) {
            this.dragging = false;
            this.$refs.input.files = event.dataTransfer.files;
            this.setFiles(event.dataTransfer.files);
        },

        setFiles(fileList) {
            this.files = Array.from(fileList);
        },

        remove(file) {
            this.files = this.files.filter((candidate) => candidate !== file);
            this.syncInput();
        },

        syncInput() {
            const transfer = new DataTransfer();
            this.files.forEach((file) => transfer.items.add(file));
            this.$refs.input.files = transfer.files;
        },

        formatSize(bytes) {
            if (bytes < 1024) return `${bytes} B`;
            if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(1)} KB`;

            return `${(bytes / (1024 * 1024)).toFixed(1)} MB`;
        },
    }));

    // ImageUpload: same drop-zone/DataTransfer mechanics as FileUpload, plus
    // an object-URL preview per file. Revokes each preview on removal to
    // avoid leaking blob URLs for images the user decided not to keep.
    Alpine.data('haloImageUpload', () => ({
        dragging: false,
        files: [],

        change(event) {
            this.setFiles(event.target.files);
        },

        drop(event) {
            this.dragging = false;
            this.$refs.input.files = event.dataTransfer.files;
            this.setFiles(event.dataTransfer.files);
        },

        setFiles(fileList) {
            this.files = Array.from(fileList).map((file) => {
                file.preview = URL.createObjectURL(file);

                return file;
            });
        },

        remove(file) {
            URL.revokeObjectURL(file.preview);
            this.files = this.files.filter((candidate) => candidate !== file);

            const transfer = new DataTransfer();
            this.files.forEach((candidate) => transfer.items.add(candidate));
            this.$refs.input.files = transfer.files;
        },
    }));

    // Toast: a single global queue rendered by <x-halo::toast/>. Push from
    // anywhere with $store.haloToast.push('Saved!', 'success').
    Alpine.store('haloToast', {
        items: [],

        push(message, variant = 'info', duration = 4000) {
            const id = `${Date.now()}-${Math.random().toString(36).slice(2)}`;

            this.items.push({ id, message, variant });

            if (duration) {
                setTimeout(() => this.remove(id), duration);
            }

            return id;
        },

        remove(id) {
            this.items = this.items.filter((item) => item.id !== id);
        },
    });
});

if (typeof window !== 'undefined' && !window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}
