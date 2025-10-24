/**
 * HaloUI JavaScript Utilities
 *
 * This file contains helper functions for HaloUI components
 */

// Modal helper functions
window.HaloUI = {
    // Open a modal by name
    openModal(name) {
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: { name }
        }));
    },

    // Close all modals
    closeModal() {
        window.dispatchEvent(new CustomEvent('close-modal'));
    },

    // Show a toast notification
    toast(type, title, message = '') {
        window.dispatchEvent(new CustomEvent('toast', {
            detail: {
                type,
                title,
                message
            }
        }));
    },

    // Toast shortcuts
    success(title, message = '') {
        this.toast('success', title, message);
    },

    error(title, message = '') {
        this.toast('error', title, message);
    },

    warning(title, message = '') {
        this.toast('warning', title, message);
    },

    info(title, message = '') {
        this.toast('info', title, message);
    }
};

// Add Alpine.js directive for click outside
document.addEventListener('alpine:init', () => {
    Alpine.directive('click-outside', (el, { expression }, { evaluateLater, effect }) => {
        const handler = evaluateLater(expression);

        const onClick = (e) => {
            if (!el.contains(e.target)) {
                handler();
            }
        };

        setTimeout(() => {
            document.addEventListener('click', onClick);
        }, 0);

        el._x_cleanups = el._x_cleanups || [];
        el._x_cleanups.push(() => {
            document.removeEventListener('click', onClick);
        });
    });
});

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        console.log('HaloUI initialized');
    });
} else {
    console.log('HaloUI initialized');
}
