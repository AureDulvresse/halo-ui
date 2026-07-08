import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [tailwindcss()],
    build: {
        outDir: 'public',
        emptyOutDir: false,
        rollupOptions: {
            input: {
                init: 'resources/js/init.js',
                halo: 'resources/css/halo.css',
            },
            output: {
                entryFileNames: 'js/[name].js',
                assetFileNames: 'css/[name][extname]',
            },
        },
    },
});
