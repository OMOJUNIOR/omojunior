import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        viteStaticCopy({
            targets: [
                {
                    src: 'node_modules/intl-tel-input/build/js/utils.js',
                    dest: 'public/vendor/intl-tel-input/build/js'
                }
            ]
        }),
    ],
    optimizeDeps: {
        include: ['intl-tel-input'], // Ensuring intl-tel-input is pre-bundled
        needsInterop: ['intl-tel-input'] // Specifically handles the interop for mixed module types
    }
});
