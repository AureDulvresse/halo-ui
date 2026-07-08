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

    // ToggleGroup: tracks the selected value(s) of a segmented control. `type`
    // is 'single' (value is a string, replaced on each select) or 'multiple'
    // (value is an array, membership toggled on each select), following the
    // WAI-ARIA button/toolbar pattern used per-item (aria-pressed).
    Alpine.data('haloToggleGroup', (type = 'single', initial = null) => ({
        type,
        value: initial,

        isSelected(v) {
            return this.type === 'multiple' ? this.value.includes(v) : this.value === v;
        },

        select(v) {
            if (this.type === 'multiple') {
                this.value = this.isSelected(v) ? this.value.filter((item) => item !== v) : [...this.value, v];

                return;
            }

            this.value = v;
        },
    }));

    // Stepper: tracks the active step by its 1-indexed position. Steps before
    // `current` are complete, the step equal to `current` is active, and later
    // steps are pending.
    Alpine.data('haloStepper', (current = 1) => ({
        current,

        isActive(step) {
            return step === this.current;
        },

        isComplete(step) {
            return step < this.current;
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

    // Combobox: a text input that filters a server-rendered list of options
    // client-side as you type (no AJAX/dynamic loading). `selected`/`selectedLabel`
    // back a hidden form input and the input's displayed text respectively;
    // `matches()` is the case-insensitive substring check each option's x-show
    // uses. Open/close/outside-click/escape follow the same discipline as
    // haloPopover, minus roving arrow-key focus (kept minimal for v1).
    Alpine.data('haloCombobox', (initialValue = null) => ({
        open: false,
        query: '',
        selected: initialValue,
        selectedLabel: '',

        matches(text, query) {
            return text.toLowerCase().includes(query.toLowerCase());
        },

        select(value, label) {
            this.selected = value;
            this.selectedLabel = label;
            this.query = '';
            this.close();
        },

        toggle() {
            this.open ? this.close() : this.openPanel();
        },

        openPanel() {
            this.open = true;
            this.query = '';
        },

        close() {
            this.open = false;
        },
    }));

    // Rating: server-rendered stars (max is known at render time), Alpine only
    // tracks the committed value and a hover preview so pointer users can see
    // a rating before committing to it.
    Alpine.data('haloRating', (initial, max) => ({
        value: initial,
        max,
        hovered: 0,

        set(v) {
            this.value = v;
        },

        hover(v) {
            this.hovered = v;
        },

        unhover() {
            this.hovered = 0;
        },
    }));

    // AlertDialog: a stricter Modal variant for confirmations that must not be
    // dismissed accidentally. Deliberately its own factory (not an `alertMode`
    // flag on haloModal) and its own open-alert-dialog/close-alert-dialog
    // events (not open-modal/close-modal), so a stray close-modal dispatch
    // elsewhere in an app can never dismiss an alert dialog, and no future
    // change to Modal (e.g. adding a new dismiss path) can regress this
    // component's "must pick an explicit action" guarantee. Shares the same
    // focus-trap/focus-restore mechanics as haloModal.
    Alpine.data('haloAlertDialog', (name) => ({
        name,
        open: false,
        previouslyFocused: null,

        init() {
            window.addEventListener('open-alert-dialog', (event) => {
                if (event.detail === this.name) {
                    this.show();
                }
            });

            window.addEventListener('close-alert-dialog', (event) => {
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
