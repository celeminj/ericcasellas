import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173,
        cors: true,
        proxy: {
            // Proxy para las llamadas a /api hacia tu backend Laravel en el puerto 80 (http)
            '/api': {
                target: 'http://localhost',
                changeOrigin: true,
                secure: false,
            },
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
});
