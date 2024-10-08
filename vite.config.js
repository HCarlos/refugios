import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js','resources/css/refugios.css'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
                reactivityTransform: true,
            },
        }),
    ],
    server: {
        host: '192.168.56.66',
        mimetype: 'text/html',
        watch: {
            usePolling: true,
        },
    },

});
