import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/global.css',
                'resources/css/footer.css',
                'resources/css/header.css',
                'resources/css/home.css',
                'resources/css/reviews_list.css',
                'resources/css/create_review.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
