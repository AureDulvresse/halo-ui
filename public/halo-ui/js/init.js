/**
 * HaloUI v3.0.0 — Alpine.js Initialization
 *
 * Provides composable Alpine.js factories for interactive components.
 * All components use clean, predictable patterns for state management.
 */

window.HaloUI = {
    /**
     * Modal component
     */
    modal(config = {}) {
        return {
            open: config.open || false,

            show() {
                this.open = true;
                document.body.style.overflow = 'hidden';
                this.$nextTick(() => this.$refs.modal?.focus());
            },

            hide() {
                this.open = false;
                document.body.style.overflow = '';
            },

            toggle() {
                this.open ? this.hide() : this.show();
            },

            handleEscape(e) {
                if (e.key === 'Escape' && this.open) {
                    this.hide();
                }
            }
        };
    },

    /**
     * Dropdown component
     */
    dropdown(config = {}) {
        return {
            open: false,

            toggle() {
                this.open = !this.open;
            },

            close() {
                this.open = false;
            },

            handleClickOutside(e) {
                if (!this.$el.contains(e.target)) {
                    this.close();
                }
            },

            handleKeydown(e) {
                if (e.key === 'Escape') {
                    this.close();
                }

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const items = this.$refs.menu?.querySelectorAll('[role="menuitem"]');
                    items?.[0]?.focus();
                }
            }
        };
    },

    /**
     * Tabs component
     */
    tabs(config = {}) {
        return {
            activeTab: config.defaultTab || 0,

            setActive(index) {
                this.activeTab = index;
            },

            isActive(index) {
                return this.activeTab === index;
            }
        };
    },

    /**
     * Accordion component
     */
    accordion(config = {}) {
        return {
            openItems: config.multiple ? [] : null,

            toggle(index) {
                if (config.multiple) {
                    const pos = this.openItems.indexOf(index);
                    if (pos > -1) {
                        this.openItems.splice(pos, 1);
                    } else {
                        this.openItems.push(index);
                    }
                } else {
                    this.openItems = this.openItems === index ? null : index;
                }
            },

            isOpen(index) {
                return config.multiple
                    ? this.openItems.includes(index)
                    : this.openItems === index;
            }
        };
    },

    /**
     * Toast/Notification system
     */
    toast() {
        return {
            notifications: [],

            add(notification) {
                const id = Date.now();
                this.notifications.push({ id, ...notification });

                if (notification.timeout !== false) {
                    setTimeout(() => this.remove(id), notification.timeout || 5000);
                }

                return id;
            },

            remove(id) {
                this.notifications = this.notifications.filter(n => n.id !== id);
            },

            clear() {
                this.notifications = [];
            }
        };
    },

    /**
     * Tooltip component
     */
    tooltip(config = {}) {
        return {
            show: false,

            mouseEnter() {
                this.show = true;
            },

            mouseLeave() {
                this.show = false;
            }
        };
    },

    /**
     * Popover component
     */
    popover(config = {}) {
        return {
            open: false,

            toggle() {
                this.open = !this.open;
            },

            close() {
                this.open = false;
            },

            handleClickOutside(e) {
                if (!this.$el.contains(e.target)) {
                    this.close();
                }
            }
        };
    },

    /**
     * Drawer/Sidebar component
     */
    drawer(config = {}) {
        return {
            open: config.open || false,

            show() {
                this.open = true;
                document.body.style.overflow = 'hidden';
            },

            hide() {
                this.open = false;
                document.body.style.overflow = '';
            },

            toggle() {
                this.open ? this.hide() : this.show();
            }
        };
    },

    /**
     * Command palette / Combobox
     */
    command(config = {}) {
        return {
            open: false,
            query: '',
            selected: 0,

            show() {
                this.open = true;
                this.query = '';
                this.selected = 0;
                this.$nextTick(() => this.$refs.input?.focus());
            },

            hide() {
                this.open = false;
                this.query = '';
            },

            handleKeydown(e) {
                if (e.key === 'Escape') {
                    this.hide();
                }

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    this.selected++;
                }

                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    this.selected = Math.max(0, this.selected - 1);
                }

                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.selectItem();
                }
            },

            selectItem() {
                // Emit custom event or call callback
                this.$dispatch('item-selected', { index: this.selected });
            }
        };
    },

    /**
     * File upload component
     */
    fileUpload(config = {}) {
        return {
            files: [],

            handleFiles(e) {
                const newFiles = Array.from(e.target.files || e.dataTransfer.files);

                if (config.multiple) {
                    this.files = [...this.files, ...newFiles];
                } else {
                    this.files = newFiles.slice(0, 1);
                }

                this.$dispatch('files-changed', this.files);
            },

            removeFile(index) {
                this.files.splice(index, 1);
                this.$dispatch('files-changed', this.files);
            },

            clear() {
                this.files = [];
                this.$dispatch('files-changed', this.files);
            }
        };
    }
};

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = window.HaloUI;
}
