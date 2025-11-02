/**
 * HaloUI v3.0 - JavaScript Utilities
 * 
 * Modern UI component library for Laravel with Alpine.js integration
 */

// Initialize Alpine.js stores and utilities
document.addEventListener('alpine:init', () => {

    // ============================================================
    // Modal Store - Global modal state management
    // ============================================================
    Alpine.store('haloModals', {
        openModals: [],
        previousFocus: new Map(),

        open(name) {
            if (!this.openModals.includes(name)) {
                // Store currently focused element
                this.previousFocus.set(name, document.activeElement);

                this.openModals.push(name);
                document.body.style.overflow = 'hidden';
                document.body.classList.add('modal-open');

                // Focus first focusable element in modal
                requestAnimationFrame(() => {
                    const modal = document.querySelector(`[x-data][x-show][data-modal="${name}"]`);
                    if (modal) {
                        const focusable = modal.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                        if (focusable) focusable.focus();
                    }
                });

                // Emit event
                window.dispatchEvent(new CustomEvent('halo:modal:opened', {
                    detail: { name }
                }));
            }
        },

        close(name) {
            const index = this.openModals.indexOf(name);
            if (index !== -1) {
                this.openModals.splice(index, 1);

                // Restore previous focus
                const previousFocus = this.previousFocus.get(name);
                if (previousFocus && document.contains(previousFocus)) {
                    previousFocus.focus();
                }
                this.previousFocus.delete(name);

                if (this.openModals.length === 0) {
                    document.body.style.overflow = '';
                    document.body.classList.remove('modal-open');
                }

                // Emit event
                window.dispatchEvent(new CustomEvent('halo:modal:closed', {
                    detail: { name }
                }));
            }
        },

        closeAll() {
            const modals = [...this.openModals];

            // Restore focus of the last opened modal
            if (modals.length > 0) {
                const lastModal = modals[modals.length - 1];
                const previousFocus = this.previousFocus.get(lastModal);
                if (previousFocus && document.contains(previousFocus)) {
                    previousFocus.focus();
                }
            }

            this.openModals = [];
            this.previousFocus.clear();
            document.body.style.overflow = '';
            document.body.classList.remove('modal-open');

            // Emit events
            modals.forEach(name => {
                window.dispatchEvent(new CustomEvent('halo:modal:closed', {
                    detail: { name }
                }));
            });
        },

        isOpen(name) {
            return this.openModals.includes(name);
        },

        get topModal() {
            return this.openModals[this.openModals.length - 1];
        },

        get count() {
            return this.openModals.length;
        }
    });

    // ============================================================
    // Toast Store - Toast notification management
    // ============================================================
    Alpine.store('haloToasts', {
        toasts: [],
        maxToasts: window.haloConfig?.toast?.max_toasts || 5,
        duration: window.haloConfig?.toast?.duration || 4000,

        add(toast) {
            const id = Date.now() + Math.random();
            const newToast = {
                id,
                type: toast.type || 'info',
                title: toast.title || '',
                message: toast.message || '',
                duration: toast.duration || this.duration,
                icon: toast.icon || this.getDefaultIcon(toast.type),
            };

            // Remove oldest if at max
            if (this.toasts.length >= this.maxToasts) {
                this.toasts.shift();
            }

            this.toasts.push(newToast);

            // Auto remove
            setTimeout(() => {
                this.remove(id);
            }, newToast.duration);

            // Emit event
            window.dispatchEvent(new CustomEvent('halo:toast:added', {
                detail: newToast
            }));

            return id;
        },

        remove(id) {
            const index = this.toasts.findIndex(t => t.id === id);
            if (index !== -1) {
                const toast = this.toasts[index];
                this.toasts.splice(index, 1);

                // Emit event
                window.dispatchEvent(new CustomEvent('halo:toast:removed', {
                    detail: toast
                }));
            }
        },

        clear() {
            this.toasts = [];
        },

        getDefaultIcon(type) {
            const icons = {
                success: 'check-circle',
                error: 'x-circle',
                warning: 'exclamation-triangle',
                info: 'information-circle',
            };
            return icons[type] || icons.info;
        }
    });

    // ============================================================
    // Theme Store - Dynamic theme management
    // ============================================================
    Alpine.store('haloTheme', {
        mode: localStorage.getItem('halo-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),

        toggle() {
            this.mode = this.mode === 'light' ? 'dark' : 'light';
            this.apply();
        },

        set(mode) {
            this.mode = mode;
            this.apply();
        },

        apply() {
            if (this.mode === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            localStorage.setItem('halo-theme', this.mode);

            // Emit event
            window.dispatchEvent(new CustomEvent('halo:theme:changed', {
                detail: { mode: this.mode }
            }));
        },

        init() {
            this.apply();
        }
    });

    // ============================================================
    // Custom Directives
    // ============================================================

    // x-tooltip directive
    Alpine.directive('tooltip', (el, { expression }, { evaluate }) => {
        const text = evaluate(expression);

        let tooltip = null;

        el.addEventListener('mouseenter', () => {
            tooltip = document.createElement('div');
            tooltip.className = 'absolute z-50 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm dark:bg-gray-700';
            tooltip.textContent = text;
            tooltip.style.position = 'fixed';
            tooltip.style.display = 'none';

            document.body.appendChild(tooltip);

            const rect = el.getBoundingClientRect();
            tooltip.style.top = `${rect.top - tooltip.offsetHeight - 8}px`;
            tooltip.style.left = `${rect.left + (rect.width - tooltip.offsetWidth) / 2}px`;
            tooltip.style.display = 'block';

            setTimeout(() => {
                tooltip.style.opacity = '1';
                tooltip.style.transition = 'opacity 200ms';
            }, 0);
        });

        el.addEventListener('mouseleave', () => {
            if (tooltip) {
                tooltip.style.opacity = '0';
                setTimeout(() => {
                    tooltip?.remove();
                    tooltip = null;
                }, 200);
            }
        });
    });
});

// ============================================================
// Global HaloUI API
// ============================================================
window.HaloUI = {
    version: '3.0.0',

    // Modal API
    modal: {
        open(name) {
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: { name }
            }));
        },

        close(name = null) {
            window.dispatchEvent(new CustomEvent('close-modal', {
                detail: { name }
            }));
        },

        closeAll() {
            if (window.Alpine?.store('haloModals')) {
                window.Alpine.store('haloModals').closeAll();
            }
        }
    },

    // Toast API
    toast: {
        show(type, title, message = '', options = {}) {
            window.dispatchEvent(new CustomEvent('toast', {
                detail: {
                    type,
                    title,
                    message,
                    ...options
                }
            }));
        },

        success(title, message = '') {
            this.show('success', title, message);
        },

        error(title, message = '') {
            this.show('error', title, message);
        },

        warning(title, message = '') {
            this.show('warning', title, message);
        },

        info(title, message = '') {
            this.show('info', title, message);
        }
    },

    // Theme API
    theme: {
        toggle() {
            if (window.Alpine?.store('haloTheme')) {
                window.Alpine.store('haloTheme').toggle();
            }
        },

        set(mode) {
            if (window.Alpine?.store('haloTheme')) {
                window.Alpine.store('haloTheme').set(mode);
            }
        },

        get() {
            return window.Alpine?.store('haloTheme')?.mode || 'light';
        }
    },

    // Utilities
    utils: {
        debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        throttle(func, limit) {
            let inThrottle;
            return function (...args) {
                if (!inThrottle) {
                    func.apply(this, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        },

        copyToClipboard(text) {
            return navigator.clipboard.writeText(text);
        }
    }
};

// Shorthand aliases
window.halo = window.HaloUI;

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
        console.log('🎨 HaloUI v3.0 initialized');

        // Initialize theme
        if (window.Alpine?.store('haloTheme')) {
            window.Alpine.store('haloTheme').init();
        }
    });
} else {
    console.log('🎨 HaloUI v3.0 initialized');
}

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = window.HaloUI;
}